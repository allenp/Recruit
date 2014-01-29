<?php

use Woodling\Woodling;
use Carbon\Carbon;

Woodling::seed('CourseOne', array('class' => 'Course', 'do' => function($blueprint) {

    $blueprint->name = 'Planetary Bodies';
}));
