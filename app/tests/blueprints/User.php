<?php

use Woodling\Woodling;
use J20\Uuid;
use Carbon\Carbon;

Woodling::seed('UserAdmin', array('class' => 'User', 'do' => function($blueprint)
{
    $blueprint->username = 'admin';
    $blueprint->email = 'admin@example.org';
    $blueprint->confirmation_code = Uuid\Uuid::v4(false);
    $blueprint->confirmed = 1;
    $blueprint->created = Carbon::now();
    $blueprint->updated = Carbon::now()->addMonths(2);
    $blueprint->account_id = function() {
        return Woodling::retrieve('ConsultingAccount')->id;
    };
    $blueprint->role = function() {
        return Woodling::retrieve('RoleAdmin');
    };
}));

Woodling::seed('UserUser', array('class' => 'User', 'do' => function($blueprint)
{
    $blueprint->username = 'user';
    $blueprint->email = 'user@example.org';
    $blueprint->confirmation_code = Uuid\Uuid::v4(false);
    $blueprint->confirmed = 1;
    $blueprint->created = Carbon::now();
    $blueprint->updated = Carbon::now()->addMonths(2);
    $blueprint->account_id = function() {
        return Woodling::retrieve('ConsultingAccount')->id;
    };
    $blueprint->role = function() {
        return Woodling::retrieve('RoleManager');
    };
}));

Woodling::seed('UserTeacher', array('class' => 'User', 'do' => function($blueprint)
{
    $blueprint->username = 'teacher';
    $blueprint->email = 'teacher@example.org';
    $blueprint->confirmation_code = Uuid\Uuid::v4(false);
    $blueprint->confirmed = 1;
    $blueprint->created = Carbon::now();
    $blueprint->updated = Carbon::now()->addMonths(2);
    $blueprint->account_id = function() {
        return Woodling::retrieve('ConsultingAccount')->id;
    };
    $blueprint->role = function() {
        return Woodling::retrieve('RoleTeacher');
    };
}));
