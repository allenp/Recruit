<?php

use Woodling\Woodling;
use Carbon\Carbon;

Woodling::seed('FirstTest', array('class' => 'Test', 'do' => function($blueprint)
{
    $blueprint->user_id = function() {
        return Woodling::retrieve('UserUser')->id;
    };

    $blueprint->teacher_id = function() {
        Woodling::retrieve('UserTeacher')->id;
    };

    $blueprint->course_id = function() {
        Woodling::retrieve('TopicOne')->course_id;
    };

    $blueprint->topic_id = function() {
        return Woodling::retrieve('TopicOne')->id;
    };

    $blueprint->started_at = Carbon::now();
    $blueprint->percentage = 0;
    $blueprint->weight = array();
    $blueprint->format = 'multiple';
    $blueprint->max_questions = 10;
    $blueprint->page_size = 5;
}));
