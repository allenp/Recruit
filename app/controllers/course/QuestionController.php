<?php

class QuestionController extends AuthorizedController {

    public function __construct(QuestionRepositoryInterface $qr)
    {
    }

    public function getCreate()
    {
        $title = Lang::get('questions/title.create_a_new_question');

        return View::make('questions/create', compact('title'));
    }
}
