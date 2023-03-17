#!/bin/bash
name_bdd=$1;
current_user=$USER;
current_host=$HOSTNAME;

 #echo $current_host;

if [ $name_bdd ]
then
 sudo mysql -e "CREATE DATABASE "$name_bdd";"


 sudo mysql -e "GRANT ALL PRIVILEGES ON '$name_bdd'.* TO '$current_user'@'$current_host';"

fi
