<?php namespace EduFocal\Testing;

class TestSession implements TestSessionInterface {

    protected $test;
    protected $questionRepository;
    protected $answerRepository;
    protected $testRepository;

    protected $format;
    protected $max;
    protected $test;

    public function __construct(
        TestRepositoryInterface $testRepository,
        IQuestionRepository $questionRepository,
        IAnswerRepository $answerRepository)
    {
        $this->test = $test;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function init($test_id, $format, $max)
    {
        $this->format = $format;
        $this->max = $max;
        $this->test = $this->testRepository->findById($test_id);
        return $this;
    }

    public function getQuestionAnswers($pageIndex=1)
    {
        if ($pageIndex < 0) {
            throw new Exception('Invalid page specified');
        }

        $weights = $this->test->getWeights();

        if ($pageIndex >= count(weights) && array_sum($weights) < $this->max) {
            $this->getNewQuestions();
        } else if ($pageIndex >= $this->max) {
            return false;
        }

        return $this->getPage($pageIndex);
    }

    /**
     * Gets a page of question/answers.
     * $pageIndex = 1 will get the first page of results.
     */
    protected function getPage(int $pageIndex)
    {
        $weights = $this->test->getWeights();

        if ($pageIndex > count($weights)) {
            return false;
        }

        $offset = 0;

        for ($i = 0; $i < $pageIndex - 1; $i++) {
            $offset += $weights[i];
        }

        if (count($this->test->answers) >= $offset + $weights[$i]) {
            return array_slice(
                $this->test->answers, $offset, $weights[$i]
            );
        } else {
            return false;
        }
    }

    protected function getNewQuestions()
    {
        if (! is_null($test->finished_at)) {
            return false;
        }

        $result = array();
        $answers = $test->answers;
        $used = array();
        foreach ($answers as $answer) {
            $used[] = $answer->question_id;
        }

        $questions = $this->questionRepository
                          ->findByTopicAndFormat(
                              $this->test->topic_id,
                              $this->test->format
                          );
    }

    protected function createAnswers($questions)
    {
        foreach ($questions as $question) {
            $this->createAnswer($question);
        }
    }

    protected function createAnswer($question)
    {
        return $this->answerRepository->createAnswer($question);
    }

    public function acceptAnswers($answers)
    {
        if (is_null($this->test->finished_at) && $this->test->finished_at > 0) {
            return;
        }

        foreach ($answers as $question_id => $ans) {

            if (empty($ans)) {
                continue;
            }

            $a = $this->answerRepository
                      ->findByTestAndQuestionAndFormat(
                          $this->test->id,
                          $question_id,
                          $this->format
                      );
            $a->answer = is_array($ans) ? json_encode($ans) : $ans;
            $a->save();
        }
    }

}
