#!/usr/bin/env sh

# run pending migrations and start server
./vendor/bin/phinx migrate && \
php -S 0.0.0.0:8080 -t public
