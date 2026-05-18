<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PostRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Post::class);
    }

    public function findByTitleSQL(string $title) {
        $query = $this->getEntityManager()->createQuery("
            SELECT *
            FROM ".Post::class." p
            WHERE p.title = :title
        ")->setParameter("title", $title);

        return $query->getResult();
    }

    public function findByTitleDQL(string $title) {
        $qb = $this->createQueryBuilder("p")
        ->where("p.title = :title")
        ->setParameter("title", $title);

        $query = $qb->getQuery();
        return $query->execute();
    }
}