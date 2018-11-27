#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
#
# If you have user-specific configurations you would like
# to apply, you may also create user-customizations.sh,
# which will be run after this script.

# create new mysql user
echo "\033[0;1;33mCreating new user for database $APP_DB_DATABASE...\033[0m"
mysql --user="$MYSQL_ROOT" --password="$MYSQL_ROOT_PW" --execute="GRANT ALL PRIVILEGES ON $APP_DB_DATABASE.* TO '$APP_DB_USERNAME'@'localhost' IDENTIFIED BY '$APP_DB_PASSWORD'"

# Add custom configuration to nginx
echo "\033[0;1;33mConfiguring nginx...\033[0m"
sudo sed -i 's/# gzip\(.*\)/gzip\1/g' /etc/nginx/nginx.conf
sudo sed -i 's/\(gzip_proxied\) .*/\1 expired no-cache no-store private auth;/g' /etc/nginx/nginx.conf
if ! grep "gzip_disable" /etc/nginx/nginx.conf
then
    sudo sed -i 's/\(^[ \t]*\)\(gzip_types.*\)/\1\2\n\1gzip_disable "MSIE [1-6]\.";/g' /etc/nginx/nginx.conf
fi
if ! grep "gzip_min_length" /etc/nginx/nginx.conf
then
    sudo sed -i 's/\(^[ \t]*\)\(gzip_vary.*\)/\1\2\n\1gzip_min_length 10240;/g' /etc/nginx/nginx.conf
fi
echo "\033[0;1;33mRestarting nginx...\033[0m"
sudo service nginx restart
systemctl status nginx.service

cd ~/code

echo "\033[0;1;33mClearing previous config...\033[0m"
php artisan config:clear

# Run database migrations and seed the database
echo "\033[0;1;33mRunning database migrations...\033[0m"
php artisan migrate:refresh --seed
