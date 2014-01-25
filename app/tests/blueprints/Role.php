<?php

use Woodling\Woodling;


Woodling::seed('RoleAdmin', array('class' => 'Role', 'do' => function($blueprint)
{
    $blueprint->id = 1;
    $blueprint->name = 'admin';
}));

Woodling::seed('RoleManager', array('class' => 'Role', 'do' => function($blueprint)
{
    $blueprint->id = 1;
    $blueprint->name = 'manager';
}));

Woodling::seed('RoleTeacher', array('class' => 'Role', 'do' => function($blueprint)
{
    $blueprint->id = 1;
    $blueprint->name = 'teacher';
}));
