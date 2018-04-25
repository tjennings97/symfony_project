<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
    public function addClass($slug, Request $request)
    {
        $course = new Course();
        $course->setCode('');
        $course->setSection('');
        $course->setProfessor('');
        $course->setDays('');
        $course->setTime('');
        $course->setLocation('');
        $course->setTitle('');

        $form = $this->createFormBuilder($course)
            ->add('code', TextType::class)
            ->add('section', TextType::class)
            ->add('professor', TextType::class)
            ->add('days', TextType::class)
            ->add('time', TextType::class)
            ->add('location', TextType::class)
            ->add('title', TextType::class)
            ->add('add', SubmitType::class, array('label' => 'Add Class'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('task_success');
        }

        return $this->render('home/addClasses.html.twig', [
             'form' => $form->createView(),
             'title' => ucwords(str_replace('-', ' ', $slug)),
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

?>