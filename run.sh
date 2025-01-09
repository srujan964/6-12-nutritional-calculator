#!/usr/bin/env sh
./vendor/bin/phinx migrate && \
php -S 0.0.0.0:8080 -t public
