<?php namespace EduFocal\Testing;

interface AnswerRepositoryInterface {

    public function findByTestAndQuestion($tid, $qid);

    public function save($answer);

    public function create($options);

}
