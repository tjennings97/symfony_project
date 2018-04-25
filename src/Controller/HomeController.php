<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
     * @Route("/classes/add/{slug}")
     */
    public function addClass($slug)
    {
        return $this->render('home/addClass.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }

    /**
     * @Route("/classes/show/{slug}")
     */
    public function showClass($slug)
    {
        return $this->render('home/showClass.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }
}