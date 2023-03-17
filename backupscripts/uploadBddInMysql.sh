#!/bin/bash

name_upload_bdd=$1
name_bdd_mysql=$2
path_root=$3

echo $USER
#DIR=/home/$path_root/data
DIR=$path_root
if [ -d "$DIR" ]
then
 echo "folder exist"
 cd "$DIR"
 if [ -e $name_upload_bdd.sql ]
 then
  echo "File exist"
  sudo mysql  $name_bdd_mysql < $name_upload_bdd.sql

  else
    echo "File not exist"
 fi
else
 echo "folder not exist"
fi
