<?php namespace EduFocal\Testing;

use EduFocal\Testing\QuestionQueryInterface;

class TestSession implements TestSessionInterface {

    protected $questionBrowser;
    protected $answerRepo;
    protected $testRepo;

    public function __construct(
        TestRepositoryInterface $testRepo,
        QuestionQueryInterface $questionBrowser,
        AnswerRepositoryInterface $answerRepo)
    {
        $this->testRepo = $testRepo;
        $this->questionBrowser = $questionBrowser;
        $this->answerRepo = $answerRepo;
    }

    public function start($options)
    {

        if (!isset($options['user_id'])) {
            throw new \Exception('User id not set.');
        }

        if (!isset($options['topic_id'])) {
            throw new \Exception('Topic id not set.');
        }

        if (isset($options['max_questions'])) {
            $max_q = $options['max_questions'];
        } else {
        //TODO: fall back to max_questions in a config somewhere
            $max_q = 20;
        }

        $count_q = $this->testRepo->countAvailableQuestions($options);

        $max_q = min($max_q, $count_q);

        $options['max_questions'] = $max_q;

        if (isset($options['page_size'])) {
            $p_size = $options['page_size'];
            //has to be at least 1
            $p_size = max($p_size, 1);
        } else {
            //TODO: use page_size from a config
            $p_size = 5;
        }

        $options['page_size'] = $p_size;

        $test = $this->testRepo->create($options);

        return $test;
    }

    public function end($test)
    {
        if (is_null($test->finished_at)) {
            $test->finished_at = Carbon::now();
            $test->mark();
            $this->testRepo->save($test);
        }

        return $test;
    }

    public function getAnswers($test, $pageIndex=1)
    {
        if ($pageIndex < 1) {
            throw new \Exception('Invalid page specified');
        }

        $weights = $test->getWeights();

        if ($pageIndex >= count($weights) && array_sum($weights) < $test->max_questions) {
            $questions = $this->getNewQuestions($test);
            $answers = $this->createAnswers($test, $questions);
        } else if ($pageIndex >= $test->max_questions) {
            return false;
        }

        //to get latest
        $test = $this->testRepo->findById($test->id);

        return $this->getPage($test, $pageIndex);
    }

    /**
     * Gets a page of question/answers.
     * $pageIndex = 1 will get the first page of results.
     */
    protected function getPage($test, $pageIndex)
    {
        $weights = $test->getWeights();

        if ($pageIndex > count($weights)) {
            return false;
        }

        $offset = 0;

        for ($i = 0; $i < $pageIndex - 1; $i++) {
            $offset += $weights[i];
        }

        if (count($test->answers) >= $offset + $weights[$i]) {
            return array_slice(
                $test->answers, $offset, $weights[$i]
            );
        } else {
            return false;
        }
    }

    protected function getNewQuestions($test)
    {
        if (! is_null($test->finished_at)) {
            throw new \Exception('Test already ended.');
        }

        $result = array();
        $used = array();

        $answers = $test->answers;

        foreach ($answers as $answer) {
            $used[] = $answer->question_id;
        }

        $options = array(
            'topic_id' => $test->topic_id,
            'format' => $test->format,
            'except' => $used,
            'page_size' => $test->page_size
        );

        $questions = $this->questionBrowser->getQuestions($options);

        return $questions;
    }

    protected function createAnswers($test, $questions)
    {
        $answers = [];
        foreach ($questions as $question) {
            $answers[] = $this->createAnswer($test, $question);
        }
        return $answers;
    }

    protected function createAnswer($test, $question)
    {
        $options = array(
            'answer' => '',
            'completed' => 'no',
            'correct' => false,
            'question_id' => $question->id,
            'question_type' => $question->type,
            'resolved' => 'no',
            'course' => $test->course_id,
            'teacher_id' => $question->user_id,
            'test_id' => $test->id,
            'topic_id' => $question->topic_id,
            'user_id' => $test->user_id
        );
        return $this->answerRepo->createAnswer($options);
    }

    /**
     * Sets the answer(s) to the question specified.
     * $answers = array('1' => 'Yes',  '4' => 'C')...
     **/
    public function setAnswers($test, $answers)
    {
        if (is_null($test->finished_at) || $test->finished_at > 0) {
            return;
        }

        foreach ($answers as $qid => $ans) {

            if (empty($ans)) {
                continue;
            }

            $a = $this->answerRepo
                ->findByTestAndQuestion($test->id, $question_id);

            if (empty($ans) or is_null($a)) {
                continue;
            }

            $a->answer = is_array($ans) ? json_encode($ans) : $ans;

            $this->answerRepo->save($a);
        }
    }
}
