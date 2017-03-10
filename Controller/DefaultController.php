<?php

namespace Nligo\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $userInfo = $this->get('nligo_user.manager_user')->get(1);
        return $this->render('NligoUserBundle:Default:index.html.twig');
    }
}
