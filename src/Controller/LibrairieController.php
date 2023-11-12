<?php

namespace App\Controller;

use App\Repository\CoordonneeRepository;
use App\Repository\MenuRepository;
use App\Repository\PublicationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibrairieController extends AbstractController
{
    private $managerRegistry;
    private $mr;
    public function __construct(ManagerRegistry $managerRegistry, MenuRepository $mr)
    {
        $this->managerRegistry = $managerRegistry;
        $this->mr = $mr;
    }
    
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
        return $this->render('default/afficher.slide.html.twig', compact('slides'));
    }

    public function afficherMenu()
    {
        $menus = $this->mr->findBy(['menuparent' => NULL, 'deleted' => NULL, 'estMasque' => false ],array('ordreAffichage' => 'ASC'));
        return $this->render('default/afficherMenu.html.twig', array(
            'menus' => $menus,
        ));
    }

    public function afficherFooter(CoordonneeRepository $cr,PublicationRepository $pr)
    {
        $coordonnee = $cr->findBy(['deleted' => null]);
        $domaines = $pr->findBy(['menu' => 3 , 'deleted' => null]);
        $menus = $this->mr->findBy(['menuparent' => NULL, 'deleted' => NULL, 'estMasque' => false ], [], 5);
        return $this->render('default/afficher.footer.html.twig', compact('menus','coordonnee','domaines'));
    }

    public function afficherHeaderForotherPage(){
        $menus = $this->mr->findBy(['menuparent' => NULL, 'deleted' => NULL, 'estMasque' => false ]);
        return $this->render('default/header.for.other.page.html.twig',compact('menus'));
    }

    public function afficherDernierePublication(PublicationRepository $pr)
    {
        $dernierPublication = $pr->findBy(['estSlide' => false,'estArticle' => true, 'deleted' => null], ['id' => 'DESC'], 3);
        return $this->render('default/dernierPublication.html.twig', compact('dernierPublication'));
    }

}
