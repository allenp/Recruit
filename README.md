# EduFocal Recruit 

A new beginning on Laravel 4.

When you first clone the repo, do:
```
composer install
```

To install all your project dependencies

Or if you already installed, run
```
composer update
```
To keep them up to date.

## Don't have composer?
```
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```
To grab composer first.

## To run migrations
```
php artisan migrate
```
from the root directory of the project.

## To Build Assets
We currently have Bassets module building the full default project. However we are moving to Gulp. To obtain a basset build run:
```
php artisan basset:build
```
from the root directory of the project.

To build your css + jss with Gulp run:
```
gulp
```

## Jottings for data model
- User Accounts
    - Organizations
        - Topics
    - Applicants
- Questions
- Tests
- Answers
