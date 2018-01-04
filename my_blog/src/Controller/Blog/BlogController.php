<?php

namespace App\Controller\Blog;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{id}", name="blog_post", methods={"GET"})
     */
    public function blog(Article $article = null)
    {
        return $this->render('blog/blog_post.html.twig', ['article' => $article]);
    }

    /**
     * @Route("/blog", name="blog_new", methods={"POST"})
     * @todo
     */
    public function blogPostNew()
    {
        return null;
    }
}
