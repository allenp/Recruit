<?php namespace EduFocal\Testing;

use \Answer;

class AnswerRepository implements AnswerRepositoryInterface {

    public function findByTestAndQuestion($tid, $qid)
    {
        return Answer::first(array('test_id' => $tid, 'question_id' => $qid));
    }

    public function save($answer)
    {
        return $answer->save();
    }

    public function create($options)
    {
        return Answer::create($options);
    }

}
