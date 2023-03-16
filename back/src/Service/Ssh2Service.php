<?php

namespace App\Service;

use phpseclib\Net\SSH2;


class Ssh2Service {
    private $ssh;

    public function __construct() {
        $this->ssh = new SSH2( '40.124.179.186' );
        if ( !$this->ssh->login( 'groupe4', 'hetic2023groupe4ZS!' ) ) {
            throw new \Exception( 'Authentication Failed...' );
        }
    }

    public function disconnectSsh2() {
        $this->ssh->disconnect();
    }
}