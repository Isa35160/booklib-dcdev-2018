<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/default/{nom}", name="default")
     */
    public function index(string $nom)
    {
        $author = $this->getDoctrine()->getRepository(Author::class)->findOneBy(["lastname" => $nom]);

        return new Response($author->getFirstname() . " " . $author->getLastname());
    }
}
