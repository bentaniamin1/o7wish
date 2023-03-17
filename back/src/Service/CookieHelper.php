<?php

namespace App\Service;

use App\Entity\User;
use Exception;
use Symfony\Component\HttpFoundation\Cookie;

class CookieHelper
{
    private JWTHelper $JWTHelper;

    public function __construct(JWTHelper $JWTHelper)
    {
        $this->JWTHelper = $JWTHelper;
    }

    /**
     * @throws Exception
     */
    public function buildCookie(User $user,): string
    {
        return Cookie::create(
            "o7wishJWT",
            $this->JWTHelper->createJWT($user),
            new \DateTime("30 minutes"),
            '',
            'localhost',
            false,
            false,
            false,
            Cookie::SAMESITE_STRICT
        );
    }
}