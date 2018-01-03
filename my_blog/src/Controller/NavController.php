<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class NavController extends Controller
{
    /**
     * @Route("/", name="welcome")
     */
    public function home()
    {
        return $this->render('home/homepage.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        return $this->render('home/blog.html.twig', [
            'articles' => $this->container->get('app.repo.article')->findAll()
        ]);
    }
}
