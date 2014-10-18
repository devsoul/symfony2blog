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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     * Redirection
     *
     * @return RedirectResponse
     *
     * @Route("/")
     *
     */
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('devsoul_blogadmin_default_dashboard'));
    }

    /**
     * Default dashboard
     *
     * @Route("/dashboard")
     * @Template()
     *
     * @return array
     */
    public function dashboardAction()
    {
        $registeredBundles = $this->container->getParameter('kernel.bundles');
        $devsoulBundles = array();

        foreach ($registeredBundles as $name => $namespace) {

            if (strpos($namespace, 'Devsoul') === 0) {
                $devsoulBundles[] = str_replace('Bundle', '', str_replace('Devsoul', '', $name));
            }
        }

        return array(
            'bundles' => $devsoulBundles
        );
    }
}