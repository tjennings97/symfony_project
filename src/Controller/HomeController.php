<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('Softball Web Application');
    }

    /**
     * @Route("/grades/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'Grades page for player: "%s"',
            $slug
        ));
    }
}