<?php

namespace App\Service;

use phpseclib3\Net\SFTP;
use PHPUnit\Util\Exception;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\throwException;

class SftpService {
    private $pseudo;
    private $password;
    public $sftp;

    public function __construct( $pseudo, $password ) {
        $this->pseudo   = $pseudo;
        $this->password = $password;
    }

    public function sftpConnect()
    : Response {

        $this->sftp = new SFTP( '40.124.179.186' );
        //$this->sftp->login( $this->pseudo, $this->password );


        if ( $this->sftp->login( $this->pseudo, $this->password ) ) {
            return new Response( json_encode( [ "Authentication Successful to sftp!" ] ) );

        } else {
            return new Response( json_encode( [ "Authentication Failed..." ] ) );
        }
    }

    public function disconnectSftp() {
        $this->sftp->disconnect();
    }

    public function renameFile( $remote_name_file, $new_remote_name_file ) {
        return $this->sftp->rename( $remote_name_file, $new_remote_name_file );
    }

    public function downloadFile( $remote_file, $local_file ) {
        return $this->sftp->get( $remote_file, $local_file );
    }

    public function outputFile( $local_file ) {
        return $this->sftp->get( $remote_file );
    }

    public function uploadFile( $local_file, $remote_file ) {
        return $this->sftp->put( $remote_file, $local_file, SFTP::SOURCE_LOCAL_FILE );
    }

    public function deleteFile( $remote_file ) {
        if ( $this->sftp->file_exists( $remote_file ) ) {
            return $this->sftp->delete( $remote_file );
        } else {
            throw new Exception( 'File invalid' );
        }
    }

    public function uploadFolder( $remote_file ) {
        if ( $this->sftp->nlist( $remote_file ) ) {

        }
    }



    public function get_folder_file( $dir ) {
        $files = $this->sftp->rawlist( $dir );
        if ( $files === false ) {
            $result = false;
        } else {
            $result = array();
            foreach ( $files as $name => $attrs ) {
                if ( ( $name != "." ) && ( $name != ".." ) ) {
                    $path     = "$dir/$name";
                    $result[] = $path;
                    if ( $attrs["type"] == NET_SFTP_TYPE_DIRECTORY ) {
                        $sub_files = $this->get_folder_file( $this->sftp, $path );
                        $result    = array_merge( $result, $sub_files );
                    }
                }
            }
        }

        return $result;
    }




}

