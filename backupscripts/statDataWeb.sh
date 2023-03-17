#!/bin/bash
projectName=$1
userName=$2
bddName=$3

folderPathProject=/var/www/"$projectName";
folderPathUser=/home/"$userName";

folderSize=$(du  $folderPathProject | awk '{ print $1 }');
#folderUserSize=$(du -sm   $folderPathUser );
folderUserSize=8;
folder_size_mb="$((folderSize / 1024 / 1024)) MB";
folder_size_mb2=$((folderSize / 1024 / 1024))

#folder_global_mb=$((folderUserSize / 1024 / 1024)) MB;
folder_global_mb=$(echo $folderUserSize)
sudo mysql -e "use "$bddName";"
bdd_size_1=$(sudo mysql -e "SELECT table_schema 'gg', sum( data_length + index_length) / 1024 / 1024 'Size of DB in MB' FROM information_schema.TABLES GROUP BY table_schema;" | awk '{ print $1 }')
bdd_size_2=$(sudo mysql -e "SELECT table_schema 'gg', sum( data_length + index_length) / 1024 / 1024 'Size of DB in MB' FROM information_schema.TABLES GROUP BY table_schema;" | awk '{ print $2 }')


key_bdd_1=$(echo $bdd_size_1 | awk '{ print $1 }')

key_bdd_2=$(echo $bdd_size_1 | awk '{ print $2 }')
key_bdd_3=$(echo $bdd_size_1 | awk '{ print $3 }')
key_bdd_4=$(echo $bdd_size_1 | awk '{ print $4 }')

value_bdd_1=$(echo $bdd_size_2 | awk '{ print $1 }')
value_bdd_2=$(echo $bdd_size_2 | awk '{ print $2 }' )
value_bdd_3=$(echo $bdd_size_2 | awk '{ print $3 }')
value_bdd_4=$(echo $bdd_size_2 | awk '{ print $4 }')


#echo $value_bdd_2;
#echo $value_bdd_3;
#echo $value_bdd_4;
#echo $folder_size_mb2;
#echo $folder_global_mb;




#folder_size_user_all="$(( value_bdd_3 + value_bdd_4 + folder_size_mb2 + folder_global_mb)) MB";
folder_size_user_all="2 MB";
cat << EOF > /home/groupe4/myStatWeb.json
{"stat_vm" : {"data_info" : [{"$name_bdd" : "$key_bdd_1", "$key_bdd_2" : "$value_bdd_2", "$key_bdd_3" : "$value_bdd_3", "$key_bdd_4" : "value_bdd_4"}], "folder_size_project" : "$folder_size_mb", "folder_size_all" : "$folder_size_user_all" }}
EOF
