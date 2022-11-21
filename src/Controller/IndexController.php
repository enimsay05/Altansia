<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/base', name: 'base')]
    public function base(): Response
    {
       /* return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/IndexController.php',
        ]);*/
        return $this->render('base.html.twig');
    }
    /**
     * @return Response
     */
    #[Route('/', name: 'actualites')]
    public function index(): Response
    {
       /* return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/IndexController.php',
        ]);*/
        return $this->render('index.html.twig');
    }
    /**
     * @return Response
     */
    #[Route('/quiSommesNous', name: 'consultants')]
    public function consultants(): Response
    {
        return $this->render('consultant.html.twig');
    }
    /**
     * @return Response
     */
    #[Route('/clients', name: 'clients')]
    public function clients(): Response
    {
        return $this->render('clients.html.twig');
    }
    /**
     * @return Response
     */
    #[Route('/offres', name: 'offres')]
    public function offres(): Response
    {
        return $this->render('offres.html.twig');
    }
}
