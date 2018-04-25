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
     * @Route("/grades/add/{slug}")
     */
    public function addGrades($slug)
    {
        return $this->render('home/addGrades.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }

    /**
     * @Route("/grades/show/{slug}")
     */
    public function showGrades($slug)
    {
        return $this->render('home/showGrades.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }
}