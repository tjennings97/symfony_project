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
    public function addClass($slug)
    {
        $course = new Course();
        /*$course->setCode('CSC135');
        $course->setSection('010');
        $course->setProfessor('Frye');
        $course->setDays('MW');
        $course->setTime('3-4:30');
        $course->setLocation('OM158');
        $course->setTitle('Computer Science I');

        $form = $this->createFormBuilder($course)
            ->add('code', TextType::course)
            ->add('section', TextType::course)
            ->add('professor', TextType::course)
            ->add('days', TextType::course)
            ->add('time', TextType::course)
            ->add('location', TextType::course)
            ->add('title', TextType::course)
            ->add('save', SubmitType::course, array('label' => 'Add Class'))
            ->getForm();
*/

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