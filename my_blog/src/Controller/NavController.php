<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class NavController extends Controller
{
    /**
     * @Route("/", name="nav_welcome")
     */
    public function home()
    {
        return $this->render('home/homepage.html.twig');
    }

    /**
     * @Route("/blog", name="nav_blog_all", methods={"GET"})
     */
    public function blogGetAll()
    {
        return $this->render('home/blog.html.twig', [
            'articles' => $this->container->get('app.repo.article')->findAll()
        ]);
    }
}
