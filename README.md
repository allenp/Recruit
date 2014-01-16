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

## To setup build tools
Run
```
npm install
```

Then run:
```
gulp
```
to build your local css + js assets

## Jottings for data model
- User Accounts
    - Organizations
        - Topics
    - Applicants
- Questions
- Tests
- Answers
