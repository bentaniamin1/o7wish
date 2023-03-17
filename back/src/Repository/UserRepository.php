<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use http\Env\Response;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find( $id, $lockMode = null, $lockVersion = null )
 * @method User|null findOneBy( array $criteria, array $orderBy = null )
 * @method User[]    findAll()
 * @method User[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class UserRepository extends ServiceEntityRepository {
    public function __construct( ManagerRegistry $registry ) {
        parent::__construct( $registry, User::class );
    }

    public function save( User $entity, bool $flush = false )
    : void {
        $this->getEntityManager()->persist( $entity );

        if ( $flush ) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove( User $entity, bool $flush = false )
    : void {
        $this->getEntityManager()->remove( $entity );

        if ( $flush ) {
            $this->getEntityManager()->flush();
        }
    }

    public function getProjectName( $id_user )
    : array {
        return $this->createQueryBuilder( 'u' )
                    ->select( 'u.projectName')
                    ->andWhere( 'u.id = :val' )
                    ->setParameter( 'val', $id_user )
                    ->getQuery()
                    ->getResult();
    }

    public function getDomainName( $id_user )
    : array {
        return $this->createQueryBuilder( 'u' )
                    ->select( 'u.domain_name')
                    ->andWhere( 'u.id = :val' )
                    ->setParameter( 'val', $id_user )
                    ->getQuery()
                    ->getResult();
    }
//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
