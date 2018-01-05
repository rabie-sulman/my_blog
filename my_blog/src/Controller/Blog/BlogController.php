<?php

namespace App\Controller\Blog;

use App\DataObject\ArticleData;
use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/blogs/{id}", name="blog_post", methods={"GET"})
     */
    public function blog(Article $article = null)
    {
        return $this->render('blog/blog_post.html.twig', ['article' => $article]);
    }

    /**
     * @Route("/blog/new", name="blog_new", methods={"POST", "GET"})
     */
    public function blogPostNew(Request $request)
    {
        $form = $this->createForm(ArticleType::class, new ArticleData());
        try {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $article = (new Article())->setText($form->getData()->text);
                $this->getDoctrine()->getManager()->persist($article);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('blog_post', ['id' => $article->getId()]);
            }
        } catch (\Exception $e) {
            $this->container->get('logger')->log($e);
        }

        return $this->render('blog/blog_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
