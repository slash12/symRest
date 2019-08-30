<?php

namespace App\Controller;

use App\Entity\Article;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ArticleController extends Controller
{
    /**
     * Create Article
     * @FOSRest\Post("/article")
     *
     * @return array
     */
    public function postArticleAction(Request $request)
    {
        $request = $request->request->all()[0];
        $article = new Article();
        $article->setName($request['name']);
        $article->setDescription($request['description']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new JsonResponse([
            // 201
            'statusCode' => Response::HTTP_CREATED,
            'txtMsg' => 'Article created',
        ]);
    }

    /**
     * Lists all Articles.
     * @FOSRest\Get("/articles")
     *
     * @return array
     */
    public function getArticleAction()
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $repository = $this->getDoctrine()->getRepository(Article::class);
        // find all articles
        $articles = $repository->findall();
        // convert result into json
        $jsonArticles = $serializer->serialize($articles, 'json');        

        return new Response($jsonArticles);
    }
}
