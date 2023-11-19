<?php

namespace App\Controller;

use App\services\SendMailService;
use App\Repository\MenuRepository;
use App\Repository\CoordonneeRepository;
use App\Repository\PublicationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(PublicationRepository $pr): Response
    {
        
        $domaines = $pr->findBy(['estSlide' => false,'menu' => 3 , 'deleted' => null]);
        return $this->render('template.html.twig', compact('domaines'));
    }

    #[Route('/AdminAuth/dashboard', name: 'app_admin')]
    public function dashboard()
    {
        return $this->render('backend.html.twig');
    }

    
    #[Route('/article/{slug}', name: 'app_article_detail')]
    public function article($slug, PublicationRepository $publicationRepo)
    {
        $publication = $publicationRepo->findBy(['slug' => $slug]);
        $publication = ($publication) ? $publication[0] : null;
        return $this->render('pages/article.html.twig', compact('publication'));
    }

    #[Route('/m/{slug}/{id}', name: 'app_menus')]
    public function menus(MenuRepository $mr,CoordonneeRepository $cr,PublicationRepository $pr, $slug = null, $id = null)
    {
        $menu = $mr->findOneBy(['slug' => $slug]);
        
        $publication = ($id != '') ? $pr->findBy(['deleted' => null,'id' => $id]) : null;
        $publications = $menu->getPublications();
        $coordonnees = $cr->findBy(['deleted' => null]);

        

        switch ($menu->getId()) {
            case '2':
                return $this->render('pages/apropos.html.twig',compact('menu','publications','publication','id'));
                break;
            case '3':
                return $this->render('pages/domaine.html.twig',compact('menu','publications'));
                break;
            case '4':
                return $this->render('pages/action.html.twig',compact('menu','publications'));
                break;
            case '5':
                return $this->render('pages/contact.html.twig',compact('menu','coordonnees'));
                break;
            case '6':
                return $this->render('pages/membre.html.twig',compact('menu','publications'));
                break;
            case '10':
                return $this->render('pages/videotheque.html.twig',compact('menu','publications'));
                break;
            
            default:
                return $this->redirectToRoute('app_homepage');
                break;
        }
    }

    #[Route('/send-mail', name: 'app_sendmail')]
    public function sendmail(Request $request,SendMailService $mail,)
    {
        if($request->isMethod('POST')){
            $form = $request->request->all();
            //envoie de mail
            $mail->mailContact($form);
        }
        return $this->redirectToRoute('app_menus', ['slug' => 'contact']);
    }

    #[Route('/nous/soutenir', name: 'app_soutenir')]
    public function soutenir()
    {
        return $this->render('pages/soutenir.html.twig');
    }



}
