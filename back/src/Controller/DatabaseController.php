<?php

namespace App\Controller;

use phpseclib\Net\SFTP;
use phpseclib\Net\SSH2;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatabaseController extends AbstractController
{

    public function createBdd($nameBdd) :void
    {
        $sftp->exec('cd /opt ; sudo ./createDatabase.sh '.$nameBdd. '' );

    }
    /**
     * @Route("/upload_bdd", methods={"POST"}, name="api_uploadbdd")
     */
    public function uploadBdd(Request $request) :Response
    {
        $file_bdd = $request->request->get('file_sql');


        $pseudo = 'ip';
        $password = 'ip';

        //$resp = $sftp->exec('ls -a');

        $ssh = new SSH2('40.124.179.186');
        $ssh->login('groupe4', 'hetic2023groupe4ZS!');


        // Switch user
        $ssh->setTimeout(10);
        $ssh->write("su ip");
        $ssh->read("Password:");
        $ssh->write("ip");

        $sftp = new SFTP('40.124.179.186');
        $sftp_login = $sftp->login('ip', 'ip');
        $directory_path = $sftp->pwd();


        $this->createBdd($file_bdd);
        // Transfer file
        $sftp->put($directory_path .'/data/here.sql', 'test.txt', SFTP::SOURCE_LOCAL_FILE);

        $sftp->exec('cd /opt ; sudo ./uploadBddInMysql.sh '.$new_local. ' ' .$bdd_remote .' '. $directory_path .'/data' );

        $fileExists = $sftp->file_exists('file.sql');

        //dd($sftp->pwd());


        return new Response(json_encode($fileExists));
    }
}
