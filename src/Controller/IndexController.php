<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use App\Repository\BaseRepository;
use App\Repository\ClientRepository;
use App\Repository\OffreRepository;
use App\Repository\PartenaireRepository;
use App\Repository\QuiSommesNousRepository;
use http\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Actualite;
use App\Form\ActualiteType;

class IndexController extends AbstractController
{
    /**
     * @param array $baseRepository
     * @return array
     */
    #[Route('/base', name: 'base')]
    public function base(array $baseRepository): array
    {
        $baseArray = array();
        foreach ($baseRepository as $key => $base) {

            $baseArray[$key] = [
                "section" => $base->getSection(),
                "adresse" => $base->getAdresse(),
                "image" => $base->getImage(),
                "path" => $base->getPath(),
            ];
        }
        $baseArray[0]["date"]= date("Y");
        return $baseArray;
    }

    /**
     * @param ActualiteRepository $actualiteRepository
     * @param PartenaireRepository $partenaireRepository
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
     * @param QuiSommesNousRepository $quiSommesNousRepository
     * @return Response
     */
    #[Route('/quiSommesNous', name: 'consultants')]
    public function consultants(QuiSommesNousRepository $quiSommesNousRepository,BaseRepository $baseRepository): Response
    {
        $qsnSections = $quiSommesNousRepository->findAll();
        $qsn = array();
        $base= $this->base($baseRepository->findAll());
        foreach ($qsnSections as $key => $qsnSection) {

            $qsn[$key] = [
                "section" => $qsnSection->getSection(),
                "text" => $qsnSection->getText(),
                "titre" => $qsnSection->getTitre(),
                "libelle" => $qsnSection->getLibelle(),
                "image" => $qsnSection->getImage(),
            ];
        }
        return $this->render('consultant.html.twig',array("qsn"=>$qsn,"base"=>$base));
    }

    /**
     * @param ClientRepository $clientRepository
     * @return Response
     */
    #[Route('/clients', name: 'clients')]
    public function clients(ClientRepository $clientRepository): Response
    {
        $clients = $clientRepository->findAll();
        $clientel = array();
        $base= $this->base();
        $titre = "";
        $titreSection2="";
        $titreSection3="";
        foreach ($clients as $key => $client) {
            if($client->getTitre()!=null && $client->getSection()=="section1"){
                $titre=$client->getTitre();
            }
            elseif ($client->getTitre()!=null && $client->getSection()=="section2"){
                $titreSection2=$client->getTitre();
            }
            elseif ($client->getTitre()!=null && $client->getSection()=="section3"){
                $titreSection3=$client->getTitre();
            }
            $clientel[$key] = [
                "section" => $client->getSection(),
                "image" => $client->getImage(),
                "text" => $client->getText(),
            ];
        }
        return $this->render('clients.html.twig',array("client"=>$clientel,"titre"=>$titre,"titre2"=>$titreSection2,"titre3"=>$titreSection3,"base"=>$base));
    }

    /**
     * @param OffreRepository $offreRepository
     * @param PartenaireRepository $partenaireRepository
     * @return Response
     */
    #[Route('/offres', name: 'offres')]
    public function offres(OffreRepository $offreRepository,PartenaireRepository $partenaireRepository,BaseRepository $baseRepository): Response
    {
        $offres = $offreRepository->findAll();
        $offreJobe = array();
        $base= $this->base($baseRepository->findAll());
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
        return $this->render('offres.html.twig' ,array("offre"=>$offreJobe,"partenaire"=>$partenaria,"base"=>$base));
    }
}
