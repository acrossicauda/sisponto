#!/bin/sh

git config --global --add safe.directory /var/www &&
git config core.hooksPath ./hooks/ &&
php artisan serve &&
/usr/bin/supervisord -c /etc/supervisord.conf
