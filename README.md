# EduFocal Corp

A new beginning on Laravel 4.

When you first clone the repo, do:
```
composer install
```

After a pull, do:
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

## To run migrations
```
php artisan migrate
```

## To Build Assets
We currently have Bassets module building the full default project. However we are moving to Gulp. To obtain a basset build run:
```
php artisan basset:build
```

To build your css + jss with Gulp run:
```
gulp
```

- User Accounts
    - Organizations
        - Topics
    - Applicants
- Questions
- Tests
- Answers
