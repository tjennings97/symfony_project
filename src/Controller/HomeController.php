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
     * @Route("/classes/home", name="homepage")
     */
    public function homepage()
    {
        /*return new Response('Softball Web Application');*/
        $courses = $this->getDoctrine()->getRepository(Course::class)->findAll();
        $repository = $this->getDoctrine()->getRepository(Course::class);

        /*$course1 = $repository->findAll();*/
        return $this->render('home/listCourses.html.twig',array('courses'=>$courses));
    }

    /**
     * @Route("/classes/add/{slug}")
     */
    public function addClass($slug, Request $request)
    {
        $course = new Course();
        

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
            $course = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($course);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('home/addClasses.html.twig', [
             'form' => $form->createView(),
             'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }

    /**
     * @Route("/classes/delete/{id})
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
        $courses = $this->getDoctrine()->getRepository(Course::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($courses);
            $entityManager->flush();

        $response = new Response();
        $response->send();
    }

}

?>