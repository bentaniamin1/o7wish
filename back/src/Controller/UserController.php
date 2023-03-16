<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\JWTAuthenticator;
use App\Service\CookieHelper;
use App\Service\JWTHelper;
use App\Service\SftpService;
use App\Service\Ssh2Service;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use phpseclib\Net\SFTP;
use phpseclib\Net\SSH2;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class UserController extends AbstractController {

    /**
     * @throws Exception
     */
    #[Route('/login', name: 'app_login')]
    public function login(CookieHelper $cookieHelper, JWTHelper $JWTHelper): JsonResponse
    {
        /** @var $user ?User */
        $user = $this->getUser();

        if (null === $user) {
            return $this->json([
                'message' => 'missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $this->json(
            [
                'jwt' => $JWTHelper->createJWT($user)
            ],
            200,
            ['set-cookie' => [$cookieHelper->buildCookie($user)]]
        );
    }

    /**
     * @throws Exception
     */
    #[Route('/register', name: 'app_register', methods: 'POST')]
    public function register(Request                        $request,
                             EntityManagerInterface         $entityManager,
                             UserPasswordHasherInterface    $hasher,
                             UserAuthenticatorInterface     $authenticator,
                             JWTAuthenticator               $JWTAuthenticator,
                             CookieHelper                   $cookieHelper,
                             JWTHelper                      $JWTHelper): JsonResponse
    {
        if (!empty($request->request->get('password'))) {
            $user = new User();
            $user->setPseudo($request->request->get('pseudo'))
                ->setPassword($hasher->hashPassword($user, $request->request->get('password')))
                ->setEmail($request->request->get('email'));

            $entityManager->persist($user);
            $entityManager->flush();

            $authenticator->authenticateUser(
                $user,
                $JWTAuthenticator,
                $request
            );

            return $this->json(
                [
                    'jwt' => $JWTHelper->createJWT($user)
                ],
                200,
                ['set-cookie' => [$cookieHelper->buildCookie($user)]]
            );
        }
        return $this->json([
            'message' => 'Echec de l\'inscription, les mots de passes ne correspondent pas !',
            'status' => 422
        ]);
    }

    /**
     * @Route("/usertest", methods={"GET"}, name="app_usertest")
     */
    public function test( Request $request )
    : Response {
        $ssh = new SSH2( '40.124.179.186' );
        if ( !$ssh->login( 'groupe4', 'hetic2023groupe4ZS!' ) ) {
            return new Response( json_encode( [ 'Login Failed ...' ] ) );
        }

        echo $ssh->exec( 'ls -la' );

        return new Response( json_encode( [ 'Login Successful !' ] ) );
    }

    /**
     * @Route("/usertest2", methods={"GET"}, name="api_usertest2")
     */
    public function test2( Request $request )
    : Response {
        $sftp       = new SFTP( '40.124.179.186' );
        $sftp_login = $sftp->login( 'groupe4', 'hetic2023groupe4ZS!' );
        if ( $sftp_login ) {
            $dir = $sftp->chdir( 'applications/wnxnxrbpgf/public_html/phpsec' );
            echo "<pre>";
            print_r( $sftp->nlist() );
            print_r( $sftp->rawlist() );
            echo "</pre>";

            return new Response( json_encode( [ 'Login Successful !' ] ) );
        }

        return new Response( json_encode( [ 'Login Failed ...' ] ) );
    }

    /**
     * @Route("/usertest3", methods={"GET"}, name="api_usertest3")
     */
    public function test3() {
        $path_of_directory = '/home/';
        $foldername        = 'groupe4';
        $sftp              = new SFTP( '40.124.179.186' );
        $sftp_login        = $sftp->login( 'groupe4', 'hetic2023groupe4ZS!' );

        $files = $sftp->nlist();

        $data_response = array();

        foreach ( $files as $file ) {
            $filepath  = $path_of_directory . '/' . $foldername . '/' . $file;
            $stat_info = $sftp->stat( $filepath );
            if ( $file !== '.' && $file !== '..' ) {
                $data_response[] = array(
                    'permissions' => $stat_info['mode'],
                    'owner'       => $stat_info['uid'],
                    'group'       => $stat_info['gid'],
                    'size'        => $stat_info['size'],
                    'modified'    => date( 'Y-m-d H:i:s', $stat_info['mtime'] ),
                    'name'        => $file,
                );
            }
        }

        return new Response( json_encode( $data_response ) );
    }

    /**
     * @Route("/createuser", methods={"POST"}, name="app_createuser")
     */
    public function createuser( Request $request, UserRepository $user_repository, EntityManagerInterface $entityManager ) {
        /** @var $user ?User */
        $user = $this->getUser();

        $name_of_new_user     = $request->request->get( 'name_of_new_user' );
        $password_of_new_user = $request->request->get( 'password_of_new_user' );
        $project_name     = $request->request->get( 'path_folder_user' );

        $user->setProjectName($project_name);

        if( !$user->getProjectName() ) {
            $entityManager->persist($user);
            $entityManager->flush();
        }

        $current_id_user = $user->getId();
        $user_repository->getProjectName($current_id_user);

        $sftp       = new SFTP( '40.124.179.186' );
        $sftp_login = $sftp->login( 'groupe4', 'hetic2023groupe4ZS!' );

        $sftp->exec( 'cd /opt ; sudo ./createUser.sh ' . $name_of_new_user . ' ' . $password_of_new_user . ' ' . $project_name . '' );

        return new Response( json_encode( '200' ) );
    }


    public function userConnectToSftp( Request $request )
    : void {
        $pseudo   = $request->request->get( 'pseudo' );
        $password = $request->request->get( 'password' );

        $sftp_connect = new SftpService( $pseudo, $password );
        $sftp_connect->sftpConnect();
    }

}