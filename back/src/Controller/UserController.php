<?php

namespace App\Controller;

use App\Service\Ssh2Service;
use phpseclib\Net\SFTP;
use phpseclib\Net\SSH2;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    public function loginUI()
    {
        
    }

    public function registerUI()
    {
        
    }

    /**
     * @Route("/usertest", methods={"GET"}, name="api_usertest")
     */
    public function test(Request $request): Response
    {
        $ssh = new SSH2('40.124.179.186');
        if (!$ssh->login('groupe4', 'hetic2023groupe4ZS!')) {
            return new Response(json_encode(['Login Failed ...']));
        }

        echo $ssh->exec('ls -la');
        return new Response(json_encode(['Login Successful !']));
    }

    /**
     * @Route("/usertest2", methods={"GET"}, name="api_usertest2")
     */
    public function test2(Request $request): Response
    {
        $sftp = new SFTP('40.124.179.186');
        $sftp_login = $sftp->login('groupe4', 'hetic2023groupe4ZS!');
        if($sftp_login) {
            $dir = $sftp->chdir('applications/wnxnxrbpgf/public_html/phpsec');
            echo "<pre>";
            print_r($sftp->nlist());
            print_r($sftp->rawlist());
            echo "</pre>";
            return new Response(json_encode(['Login Successful !']));
        }
        return new Response(json_encode(['Login Failed ...']));
    }

    /**
     * @Route("/usertest3", methods={"GET"}, name="api_usertest3")
     */
    public function test3()
    {
        $path_of_directory = '/home/';
        $foldername = 'groupe4';
        $sftp = new SFTP('40.124.179.186');
        $sftp_login = $sftp->login('groupe4', 'hetic2023groupe4ZS!');

        $files = $sftp->nlist();

        $data_response = array();

        foreach ($files as $file) {
            $filepath =  $path_of_directory . '/' . $foldername . '/' . $file;
            $stat_info = $sftp->stat($filepath);
            if ($file !== '.' && $file !== '..') {
                $data_response[] = array(
                    'permissions' => $stat_info['mode'],
                    'owner' => $stat_info['uid'],
                    'group' => $stat_info['gid'],
                    'size' => $stat_info['size'],
                    'modified' => date('Y-m-d H:i:s', $stat_info['mtime']),
                    'name' => $file
                );
            }
        }

        return new Response(json_encode($data_response));
    }
}