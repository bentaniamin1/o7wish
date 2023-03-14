<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    /*
     * Pour mettre en place Faker PHP
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // Users
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail($this->faker->email())
//                ->setRoles(['ROLE_USER'])
                ->setPseudo(mt_rand(0,1) === 1 ? $this->faker->firstname() : null)
                ->setPassword('password');

            $manager->persist($user);
        }

        $manager->flush();
    }
}
