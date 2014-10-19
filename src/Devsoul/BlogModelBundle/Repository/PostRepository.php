<?php

/*
 * This file is part of Devsoul's packages.
 *
 * (c) Stoyan Rangelov (devsoul) <stoyan.rangelov@gmail.com>
 *
 */

namespace Devsoul\BlogModelBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Devsoul\BlogModelBundle\Entity\Post;

/**
 * Class PostRepository
 */
class PostRepository extends EntityRepository
{
    /**
     * Find latest
     *
     * @param int $num
     *
     * @return array
     */
    public function findLatest($num)
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('n.createdAt', 'desc')
            ->setMaxResults($num);

        return $qb->getQuery()->getResult();
    }

    /**
     *  Sorted by date
     *
     * @return array
     */
    public function fetchPostByDateCreated()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('n.createdAt', 'desc');

        return $qb->getQuery()->getResult();
    }

    /**
     * Find the first Post
     *
     * @return Post
     */
    public function findFirst()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('n.id', 'asc')
            ->setMaxResults(1);

        return $qb->getQuery()->getSingleResult();
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository('DevsoulBlogModelBundle:Post')->createQueryBuilder('n');

        return $qb;
    }
}