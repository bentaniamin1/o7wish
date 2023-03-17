#!/bin/bash

domain=$2
name_of_site=$1
cache_enable=$3


root_directory="/var/www/${1}"

if [ $cache_enable ]
then


test="# pass PHP scripts to FastCGI server
    proxy_cache_path /data/nginx/cache keys_zone=mycache:10m;

    location ~ \.html$ {
       proxy_cache mycache;
        }";
else

test=;

fi



config_file="/etc/nginx/sites-available/${name_of_site}"
cp /etc/nginx/sites-available/default /etc/nginx/sites-available/$name_of_site
cat > "$config_file" <<EOF
server {
    listen 80;
    listen [::]:80;

    root $root_directory;
    index index.php index.html index.htm index.nginx-debian.html;

    server_name $domain;

    location / {
        try_files \$uri \$uri/ =404;
    }


    $test

    # pass PHP scripts to FastCGI server
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;

            # With php-fpm (or other unix sockets):
            fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
            # With php-cgi (or other tcp sockets):
            #fastcgi_pass 127.0.0.1:9000;
        }

}
EOF