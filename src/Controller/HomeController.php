<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Course;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
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
        $class = new Course();
        $class->setCode('CSC135');
        $class->setSection('010');
        $class->setProfessor('Frye');
        $class->setDays('MW');
        $class->setTime('3-4:30');
        $class->setLocation('OM158');
        $class->setTitle('Computer Science I');

        $form = $this->createFormBuilder($class)
            ->add('code', TextType::class)
            ->add('section', TextType::class)
            ->add('professor', TextType::class)
            ->add('days', TextType::class)
            ->add('time', TextType::class)
            ->add('location', TextType::class)
            ->add('title', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Add Class'))
            ->getForm();


        return $this->render('home/addClasses.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)), array(
                'form' => $form->createView(),
            )
        ]);
    }

    /**
     * @Route("/classes/show/{slug}")
     */
    public function showClass($slug)
    {
        return $this->render('home/showClasses.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }
}