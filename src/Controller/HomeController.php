<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
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
        $comments = [
            'I had wawa for dinner.',
            'We spilt against Wilmington today',
            'I am so excited to sleep',
        ];

        dump($slug, $this);

        return $this->render('home/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
        ]);
    }
}