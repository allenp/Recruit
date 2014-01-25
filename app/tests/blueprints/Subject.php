<?php

use Woodling\Woodling;
use Carbon\Carbon;

Woodling::seed('SubjectOne', array('class' => 'Subject', 'do' => function($blueprint) {

    $blueprint->name = 'Planetary Bodies';
}));
