<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Persistence\Doctrine\ORM;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

abstract class DoctrineRepository extends ServiceEntityRepository
{
    protected ?EntityManagerInterface $manager;

    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, $entityClass);
        $this->manager = $this->getEntityManager();
    }
}
