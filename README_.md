# EduFocal Corp

A new beginning on Laravel 4.

When you first clone the repo, do:
```
composer install
```

After a pull, do:
```
composer update
```

Don't have composer?
```
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```

To run migrations
```
php artisan migrate
```

To build assets
```
php artisan basset:build
```

- User Accounts
    - Organizations
        - Topics
    - Applicants
- Questions
- Tests
- Answers
