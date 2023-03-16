<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\SftpService;
use App\Service\Ssh2Service;
use phpseclib\Net\SFTP;
use phpseclib\Net\SSH2;
use PHPUnit\Util\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FolderController extends AbstractController {
    /**
     * @Route("/add_put_config_site", methods={"POST"}, name="api_addputconfigsite")
     */
    public function addputconfigsite( Request $request ) {
        $domain       = $request->request->get( 'domain' );
        $name_of_site = $request->request->get( 'name_of_site' );
        //true or false
        $cache_enable = $request->request->get( 'cache_enable' );

        $pseudo   = 'ip';
        $password = 'ip';

        //$resp = $sftp->exec('ls -a');

        $ssh = new SSH2( '40.124.179.186' );
        $ssh->login( 'groupe4', 'hetic2023groupe4ZS!' );


        // Switch user
        $ssh->setTimeout( 10 );
        $ssh->write( "su ip" );
        $ssh->read( "Password:" );
        $ssh->write( "ip" );


        $sftp = new SFTP( '40.124.179.186' );
        $sftp->login( 'ip', 'ip' );

        $sftp->exec( 'cd /opt ; sudo ./createConfigSite.sh ' . $domain . ' ' . $name_of_site . ' ' . $cache_enable . '' );

        $sftp->disconnect();
        $ssh->disconnect();
        return new Response( json_encode( "200 create Config site" ) );
    }

    /**
     * @Route("/enable_config_site", methods={"POST"}, name="api_enableconfigsite")
     */
    public function enableConfigsite( Request $request ) {
        //true or false
        $enable_site  = $request->request->get( 'enable_site' );
        $name_of_site = $request->request->get( 'name_of_site' );

        $pseudo   = 'ip';
        $password = 'ip';

        //$resp = $sftp->exec('ls -a');

        $ssh = new SSH2( '40.124.179.186' );
        $ssh->login( 'groupe4', 'hetic2023groupe4ZS!' );


        // Switch user
        $ssh->setTimeout( 10 );
        $ssh->write( "su ip" );
        $ssh->read( "Password:" );
        $ssh->write( "ip" );

        $sftp_connect = new SftpService( 'ip', 'ip' );
        $sftp_connect->sftpConnect();

        /*        $sftp = new SFTP('40.124.179.186');
                $sftp->login('ip', 'ip');*/

        $sftp_connect->sftp->exec( 'cd /opt ; sudo ./deploymentSites.sh ' . $enable_site . ' ' . $name_of_site . '' );

        $sftp_connect->disconnectSftp();
        $ssh->disconnect();
        return new Response( json_encode( "200 create Config site" ) );
    }

    /**
     * @Route("/sendFileOrfolder", methods={"POST"}, name="api_sendFileOrfolder")
     */
    public function sendFileOrFolder( Request $request ) {

        return new Response( json_encode( "200 create Config site" ) );
    }

    /**
     * @Route("/deleteFileOrfolder", methods={"POST"}, name="api_deleteFileOrfolder")
     */
    public function deleteFileOrFolder( Request $request ) {

        return new Response( json_encode( "200 create Config site" ) );
    }


    /**
     * @Route("/uploadfileorfolder", methods={"POST"}, name="api_updateFileOrfolder")
     */
    public function uploadFileOrFolder( Request $request ) {

        $ssh = new SSH2( '40.124.179.186' );
        $ssh->login( 'groupe4', 'hetic2023groupe4ZS!' );

        $file = $request->request->get( 'file' );

        $sftp_connect = new SftpService( 'ip', 'ip' );
        $sftp_connect->sftpConnect();
        $directory_path = $sftp_connect->sftp->pwd();

        $sftp_connect->uploadFile( $file , 'elementor.zip');

        $sftp_connect->disconnectSftp();


        $sftp_connect = new SftpService( 'groupe4', 'hetic2023groupe4ZS!' );
        $sftp_connect->sftpConnect();

        if ( $sftp_connect->sftpConnect() ) {
            $sftp_connect->sftp->exec( 'sudo unzip -q ' . $directory_path . '/' . $file . ' -d  /var/www/' );
            $sftp_connect->sftp->exec( 'sudo rm ' . $directory_path . '/' . $file );

        }else {
            throw new Exception( 'Not connected ' );
        }

        $sftp_connect->disconnectSftp();
        return new Response( json_encode( "200 send zip , unzip" ) );
    }

    #[Route('/backup', name:'app_backup')]
    public function getBackup(): void
    {
        /** @var $user ?User */
        $user = $this->getUser();

        $db_name = "";

        $ssh = new SSH2( '40.124.179.186' );
        $ssh->login( 'groupe4', 'hetic2023groupe4ZS!' );

        $sftp_connect = new SftpService( 'groupe4', 'hetic2023groupe4ZS!' );
        $sftp_connect->sftpConnect();

        $sftp_connect->sftp->exec( 'mkdir /home/'. $user->getPseudo() . '~/backup-' . $user->getProjectName() . '-`date +%D`' );
        $sftp_connect->sftp->exec( 'cp -r /var/www/'. $user->getProjectName() . '~/backup-' . $user->getProjectName() . '-`date +%D`' );
        $sftp_connect->sftp->exec( 'mysqldump '. $db_name . ' > ~/backup-' . $user->getProjectName() . '-`date +%D`/' . $db_name . '_backup.sql' );
        $sftp_connect->sftp->exec( 'zip -r ~/backup-' . $user->getProjectName() . '-`date +%D`.zip ~/backup-' . $user->getProjectName() . '-`date +%D`');
        $sftp_connect->downloadFile('../../backups/backup-' . $user->getProjectName() . '-`date +%D`','~/backup-' . $user->getProjectName() . '-`date +%D`');

        $sftp_connect->disconnectSftp();
        $ssh->disconnect();
    }
}