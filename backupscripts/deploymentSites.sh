#!/bin/bash

name_of_new_user=$1
password_of_new_user=$2
directory=$3
sudo mysql -e "CREATE USER '$name_of_new_user'@'localhost' IDENTIFIED BY '$password_of_new_user';"
sudo useradd -m -d /home/$name_of_new_user -s /bin/bash $name_of_new_user
echo $name_of_new_user:$password_of_new_user | sudo chpasswd

sudo mkdir /var/www/$directory/
sudo chown $name_of_new_user:$name_of_new_user /var/www/$directory/
groupe4@Groupe4:/opt$ cat createDatabase.sh

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
groupe4@Groupe4:/opt$ cat deploymentSites.sh
#!/bin/bash

enable_site=$1
name_site=$2

if [ $name_site ]
 then
 if [ $enable_site == "yes" ]
  then
  sudo vim /etc/nginx/sites-available/$name_site
  sudo ln -s /etc/nginx/sites-available/$name_site /etc/nginx/sites-enabled/$name_site | \
  sudo systemctl nginx reload
 else
  if [ $enable_site == "no" ]
   then
   echo 'test';
   sudo rm /etc/nginx/sites-enabled/$name_site
   sudo systemctl nginx reload
  fi
 fi
fi
