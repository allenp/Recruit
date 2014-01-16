<?php

use Woodling\Woodling;
use J20\Uuid;
use Carbon\Carbon;

Woodling::seed('ConsultingAccount', array('class' => 'Account', 'do' => function($blueprint)
{
    $blueprint->name = 'Blueprint Consulting';
    $blueprint->email = 'blue@example.org';
    $blueprint->timezone = 'America/Jamaica';
    $blueprint->activation_key = Uuid\Uuid::v4(false);
    $blueprint->activated = 1;
}));
