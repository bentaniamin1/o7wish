<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;

class Ssh2Service
{
    private $connexion;
    private String $ip;
    private String $username;
    private String $password;

    public function __construct()
    {
        $this->ip = '40.124.179.186';
        if(!$this->connexion) {
            $this->connexion = ssh2_connect($this->ip, 22);
        }
    }

    public function ssh2connect(): Response
    {
        ssh2_auth_password($this->connexion, 'test', 'password');
//        $connection = ssh2_connect('40.124.179.186', 22);
//        ssh2_auth_password($connection, 'test', 'password');

        if (ssh2_auth_password($this->connexion, 'test', 'password')) {
            return new Response(json_encode(["Authentication Successful!"]));
//         $stream = ssh2_exec($this->connexion, "pwd");
//         echo "Output: " . stream_get_contents($stream);

       } else {
            return new Response(json_encode(["Authentication Failed..."]));
       }

//       fclose($stream);
    }
}