<?php

/*
 * This file is part of Devsoul's packages.
 *
 * (c) Stoyan Rangelov (devsoul) <stoyan.rangelov@gmail.com>
 *
 */

namespace Devsoul\ModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Devsoul\BlogModelBundle\Entity;

/**
 * Fixtures for the Post Entity
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 25;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $n1 = new Entity\Post();
        $n1->setTitle('Demo post');
        $n1->setBody("Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
         desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
         Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
         desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
        $n1->setAuthor($this->getAuthor($manager, 'Stoyan'));

        $n2 = new Entity\Post();
        $n2->setTitle('Demo post');
        $n2->setBody("It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
         The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',
         making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,
         and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,
         sometimes by accident, sometimes on purpose (injected humour and the like).");
        $n2->setAuthor($this->getAuthor($manager, 'Dimitar'));

        $n3 = new Entity\Post();
        $n3->setTitle('Demo post 3');
        $n3->setBody("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
        by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,
        you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the
        Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of
        over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.
        The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.");
        $n3->setAuthor($this->getAuthor($manager, 'Georgi'));

        $n4 = new Entity\Post();
        $n4->setTitle('Demo post');
        $n4->setBody("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
        by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,
        you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the
        Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of
        over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.
        The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.");
        $n4->setAuthor($this->getAuthor($manager, 'Stoyan'));


        $manager->persist($n1);
        $manager->persist($n2);
        $manager->persist($n3);
        $manager->persist($n4);

        $manager->flush();
    }

    /**
     * Get an author
     *
     * @param ObjectManager $manager
     * @param string        $name
     *
     * @return Entity\Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('DevsoulBlogModelBundle:Author')->findOneBy(array('name' => $name));
    }


}