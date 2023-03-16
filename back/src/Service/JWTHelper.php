<?php

namespace App\Service;

use App\Entity\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHelper
{
    private string $appSecret;

    public function __construct(string $appSecret)
    {
        $this->appSecret = $appSecret;
    }

    public function createJWT(User $user): string
    {
        return JWT::encode([
            'pseudo' => $user->getPseudo(),
            'id' => $user->getId()
        ],
            $this->appSecret,
            'HS256');
    }

    /**
     * @param string $jwt
     * @return bool
     */
    public function isJwtValid(string $jwt): bool
    {
        try {
            return (bool)JWT::decode($jwt, new Key($this->appSecret, 'HS256'));
        } catch (\Exception $e) {
            return false;
        }
    }
}