<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use App\Repository\OffreRepository;
use App\Repository\PartenaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Actualite;
use App\Form\ActualiteType;

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
     * @param ActualiteRepository $actualiteRepository
     * @return Response
     */
    #[Route('/', name: 'actualites')]
    public function index(ActualiteRepository $actualiteRepository,PartenaireRepository $partenaireRepository): Response
    {
        /* return $this->json([
             'message' => 'Welcome to your new controller!',
             'path' => 'src/Controller/IndexController.php',
         ]);*/

        $actualites = $actualiteRepository->findAll();
        $data = array();
        foreach ($actualites as $key => $actualite) {
            $data[$key] = [
                "section" => $actualite->getSection(),
                "text" => $actualite->getText(),
                "titre" => $actualite->getTitre(),
                "image" => $actualite->getImage(),
                "style" => $actualite->getStyleImg(),
            ];
        }

        $partenaires = $partenaireRepository->findAll();
        $partenaria = array();
        foreach ($partenaires as $key => $partenaire) {
            $partenaria[$key] = [
                "image" => $partenaire->getImage(),
            ];
        }

        return $this->render('index.html.twig',array("data"=>$data,"partenaire"=>$partenaria));
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
    public function offres(OffreRepository $offreRepository,PartenaireRepository $partenaireRepository): Response
    {
        $offres = $offreRepository->findAll();
        $offreJobe = array();
        foreach ($offres as $key => $offre) {
            $offreJobe[$key] = [
                "id" => $offre->getId(),
                "text" => $offre->getText(),
                "titre" => $offre->getTitre(),
                "email" => $offre->getEmail(),
            ];
        }
        $partenaires = $partenaireRepository->findAll();
        $partenaria = array();
        foreach ($partenaires as $key => $partenaire) {
            $partenaria[$key] = [
                "image" => $partenaire->getImage(),
            ];
        }
        return $this->render('offres.html.twig' ,array("offre"=>$offreJobe,"partenaire"=>$partenaria));
    }
}
