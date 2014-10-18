<?php

/*
 * This file is part of Devsoul's packages.
 *
 * (c) Stoyan Rangelov (devsoul) <stoyan.rangelov@gmail.com>
 *
 */

namespace Devsoul\BlogAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SecurityController
 */
class SecurityController extends Controller
{
    /**
     * Login
     *
     * @param Request $request
     *
     * @return Response|RedirectResponse
     *
     * @Route("/login")
     */
    public function loginAction(Request $request)
    {
        //If the user is logged
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {

            return $this->redirect($this->generateUrl('devsoul_blogadmin_default_dashboard'));
        }

        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        return $this->render(
            'DevsoulBlogAdminBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error' => $error,
            )
        );

    }

    /**
     * Login check
     *
     * @Route("login-check")
     */
    public function loginCheckAction()
    {

    }

    /**
     * Logout
     *
     * @Route("logout")
     */
    public function logoutAction()
    {

    }

}