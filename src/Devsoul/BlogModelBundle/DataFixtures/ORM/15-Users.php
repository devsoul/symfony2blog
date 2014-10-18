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
 * Fixtures for the User Entity
 */
class Users extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 15;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $u1 = new Entity\User();
        $u1->setUsername('admin@admin.com');
        $u1->setPassword(password_hash('admin', PASSWORD_BCRYPT));
        $u1->addRole($this->getRole($manager, 'admin'));
        $u1->setIsActive(true);

        $manager->persist($u1);
        $manager->flush();
    }

    /**
     * Get the role
     *
     * @param ObjectManager $manager
     * @param string        $name
     *
     * @return Entity\Role
     */
    private function getRole(ObjectManager $manager, $name)
    {
        return $manager->getRepository('DevsoulBlogModelBundle:Role')->findOneBy(array('name' => $name));
    }
}