<?php

use Woodling\Woodling;
use Carbon\Carbon;

Woodling::seed('TopicOne', array('class' => 'Topic', 'do' => function($blueprint) {

    $blueprint->name = 'Facts about planets';
    $blueprint->subject_id = function() {
        return Woodling::retrieve('SubjectOne')->id;
    };
}));
