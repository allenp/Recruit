<?php

use Woodling\Woodling;


Woodling::seed('manage_permissions', array('class' => 'Permission', 'do' => function($blueprint)
{
    $blueprint->id = 2;
    $blueprint->name = 'manage_permissions';
    $blueprint->display_name = 'manage permissions';
}));
Woodling::seed('manage_users', array('class' => 'Permission', 'do' => function($blueprint)
{
    $blueprint->id = 3;
    $blueprint->name = 'manage_users';
    $blueprint->display_name = 'manage users';
}));
