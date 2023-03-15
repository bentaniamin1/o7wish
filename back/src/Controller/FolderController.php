<?php

namespace App\Controller;

use phpseclib\Net\SFTP;
use phpseclib\Net\SSH2;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FolderController extends AbstractController
{
    #[Route('/folder', name: 'app_folder')]
    public function index(): Response
    {
        return $this->render('folder/index.html.twig', [
            'controller_name' => 'FolderController',
        ]);
    }

    /**
     * @Route("/add_put_config_site", methods={"POST"}, name="api_addputconfigsite")
     */
    public function addputconfigsite(Request $request)
    {
        $domain = $request->request->get('domain');
        $name_of_site = $request->request->get('name_of_site');
        //true or false
        $cache_enable = $request->request->get('cache_enable');

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
        $sftp->login('ip', 'ip');

        $sftp->exec('cd /opt ; sudo ./createConfigSite.sh '.$domain. ' ' .$name_of_site .' '. $cache_enable .'' );


        return new Response(json_encode("200 create Config site"));
    }

    /**
     * @Route("/enable_config_site", methods={"POST"}, name="api_enableconfigsite")
     */
    public function enableConfigsite(Request $request)
    {
        //true or false
        $enable_site = $request->request->get('enable_site');
        $name_of_site = $request->request->get('name_of_site');

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
        $sftp->login('ip', 'ip');

        $sftp->exec('cd /opt ; sudo ./deploymentSites.sh '.$enable_site. ' ' .$name_of_site.'' );


        return new Response(json_encode("200 create Config site"));
    }
}

