<?php

/*
 * This file is part of Devsoul's packages.
 *
 * (c) Stoyan Rangelov (devsoul) <stoyan.rangelov@gmail.com>
 *
 */

namespace Devsoul\BlogFrontendBundle\Controller;

use Devsoul\BlogModelBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * Class PostController
 */
class PostController extends Controller
{
    /**
     * Show the posts index
     *
     * @Route("/")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository('DevsoulBlogModelBundle:Post')->findAll();
        $latestPosts = $this->getDoctrine()->getRepository('DevsoulBlogModelBundle:Post')->findLatest(5);

        return array(
            'posts' => $posts,
            'latestPosts' => $latestPosts
        );
    }

    /**
     * Show a post
     *
     * @param string $slug
     *
     * @throws NotFoundHttpException
     * @return array
     *
     * @Route("/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $post = $this->getDoctrine()->getRepository('DevsoulBlogModelBundle:Post')->findOneBy(array('slug' => $slug));

        if (is_null($post)) {
            throw new $this->createNotFoundException("Post was not found");
        }


        return array('post' => $post);
    }

}