<?php

use Woodling\Woodling;
use Carbon\Carbon;

Woodling::seed('QuestionOne', array('class' => 'Question', 'do' => function($blueprint) {

    $blueprint->user_id = function() {
        return Woodling::retrieve('UserTeacher')->id;
    };
    $blueprint->topic_id = function() {
        return Woodling::retrieve('TopicOne')->id;
    };
     
    $blueprint->question = 'What is the circumference of the moon?';
    $blueprint->accepted_answers = 'B';
    $blueprint->type = 'Multiple';
    $blueprint->choices = ['A' => '4555', 'B' => '3.14', 'C' => '456', 'D' => '3.2'];
}));
