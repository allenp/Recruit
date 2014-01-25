<?php namespace EduFocal\Testing;

interface QuestionRepositoryInterface {

    public function create($options);
    public function save($question);
    public function countAvailableQuestions();

}
