<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use App\Repository\PublicationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibrairieController extends AbstractController
{
    
    
    public function afficherSidebar()
    {
        return $this->render('default/sidebar.html.twig');
    }

    public function afficherSlide(PublicationRepository $publicationRepo)
    {
        $slides = $publicationRepo->findBy(array('estSlide' => true, 'deleted' => null), array('ordreAffichage' => 'ASC'));
        return $this->render('default/afficher.slide.html.twig', compact('slides'));
    }

    public function afficherApropos($id)
    {
        // $article = $publicationRepo->findBy(['menu' => true, 'deleted' => null ]);
        return $this->render('default/afficher.slide.html.twig', compact('slides'));
    }


    public function afficherMenu(MenuRepository $mr)
    {
        // $menus = $this->getDoctrine()
        //     ->getRepository(Menu::class)->findBy(['menuparent' => NULL, 'deleted' => NULL, 'masque' => false ]);
        $menus = $mr->findBy(['menuparent' => NULL, 'deleted' => NULL, 'estMasque' => false ]);
        return $this->render('default/afficherMenu.html.twig', array(
            'menus' => $menus,
        ));
    }

    public function afficherDernierePublication(PublicationRepository $pr)
    {
        $dernierPublication = $pr->findBy(['estSlide' => false, 'deleted' => null], ['id' => 'DESC'], 3);
        return $this->render('default/dernierPublication.html.twig', compact('dernierPublication'));
    }

}
