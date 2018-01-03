<?php

namespace App\Controller\Blog;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{id}", name="blog_post")
     */
    public function blog(Article $article)
    {
        
    }
}
