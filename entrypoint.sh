#!/usr/bin/env sh

for arg in $@
do
    if [ "$arg" = "shell" ]
    then
       exec /bin/sh
    elif [ "$arg" = "dev" ]
    then
        chmod -R a+x ./storage
        php artisan cache:clear
        php artisan config:cache
        # echo "zend_extension=xdebug.so" >> /etc/php7/conf.d/xdebug.ini
    elif [ "$arg" = "test" ]
    then
        php artisan config:clear
        php artisan config:cache
        wait 5
        php artisan migrate
        exec ./vendor/bin/phpunit ./tests
    elif [ "$arg" = "coverage" ]
    then
        php artisan config:clear
        php artisan config:cache
        exec ./vendor/bin/phpunit --testsuite="Unit" --coverage-html ./tests/reports
    elif [ "$arg" = "migrate" ]
    then
        chmod -R a+x ./storage
        php artisan config:cache
        exec php artisan migrate
    else
        echo "I don't know what I have to do"
    fi
done
