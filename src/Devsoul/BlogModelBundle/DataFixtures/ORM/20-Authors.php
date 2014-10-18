<?php

/*
 * This file is part of Devsoul's packages.
 *
 * (c) Stoyan Rangelov (devsoul) <stoyan.rangelov@gmail.com>
 *
 */

namespace Devsoul\BlogModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Devsoul\BlogModelBundle\Entity;

/**
 * Fixtures for the Author Entity
 */
class Authors extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $a1 = new Entity\Author();
        $a1->setName('Stoyan');

        $a2 = new Entity\Author();
        $a2->setName('Dimitar');

        $a3 = new Entity\Author();
        $a3->setName('Georgi');

        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);

        $manager->flush();
    }


}