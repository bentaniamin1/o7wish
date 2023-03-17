#!/bin/bash

name_of_new_user=$1
password_of_new_user=$2
directory=$3
sudo mysql -e "CREATE USER '$name_of_new_user'@'localhost' IDENTIFIED BY '$password_of_new_user';"
sudo useradd -m -d /home/$name_of_new_user -s /bin/bash $name_of_new_user
echo $name_of_new_user:$password_of_new_user | sudo chpasswd

sudo mkdir /var/www/$directory/
sudo chown $name_of_new_user:$name_of_new_user /var/www/$directory/