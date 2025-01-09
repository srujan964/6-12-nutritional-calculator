#!/usr/bin/env sh

# Check if Phinx is installed in vendor/bin and run migrations
if [ -f "./vendor/bin/phinx" ]; then
    echo "Running Phinx migrations..."
    ./vendor/bin/phinx migrate
    if [ $? -ne 0 ]; then
        echo "Phinx migrations failed!" >&2
        exit 1
    fi
else
    echo "Phinx not found. Please ensure it's installed by running 'composer install'." >&2
    exit 1
fi

# Start PHP built-in server
echo "Starting PHP"
php -S 0.0.0.0:8080 -t public
