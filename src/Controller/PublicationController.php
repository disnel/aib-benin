<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Form\PublicationType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PublicationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/publication')]
class PublicationController extends AbstractController
{
    #[Route('/', name: 'app_publication_index', methods: ['GET'])]
    public function index(PublicationRepository $publicationRepository): Response
    {
        return $this->render('publication/index.html.twig', [
            'publications' => $publicationRepository->findAll(),
        ]);
    }

    #[Route('/new/{id}', name: 'app_publication_new', methods: ['GET', 'POST'])]
    public function new(Request $request,PublicationRepository $pr, MenuController $menucontrol, SluggerInterface $slugger,
    EntityManagerInterface $em, $id = null): Response
    {
        $publication = new Publication();
        if($id != ''){
            $publication = $pr->find($id);
        }
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $slug = $menucontrol->removeAccent($publication->getTitre());
            $slug = strtolower($slug);
            $slug = $slugger->slug($slug);
            $publication->setSlug($slug);

            $image = $_FILES["publication"]["name"]["nomImage"];

            $existImage = $request->request->get('existimage');
        

            try {
                ($existImage)? $publication->setNomImage($existImage): null ;// old image
                (!empty($image) && $image != "")? $publication->setNomImage($image): null ; //new image
                $em->persist($publication);
                $em->flush();
                if($existImage){
                    // cas de modification d'image
                }else{
                    //cas d'ajout d'image
                }
                
            } catch (\Throwable $th) {
                $this->addFlash('error', $th);
            }

            $directory = $this->getParameter('files_directory');
            $new_directory = $directory.'/publication/pub_'.$publication->getId();
            if (!file_exists($new_directory)) {  mkdir($new_directory, 0777, true); }

            //image de couverture
            if(!empty($image) && $image != ""){
               
                $name = explode('.', $image);
                $extension = '.'.$name[1];
                if (!empty($extension)) {
                    //generation d'un name pour le fichier
                    $filename = $name[0] . '' . $extension;
                    //si le fichier n'existe pas on le cree
                    if (!file_exists('$new_directory/$filename')) {
                        $publication->setNomImage($filename);
                        $em->flush();
                        move_uploaded_file($_FILES["publication"]["tmp_name"]["nomImage"], "$new_directory/$filename");
                    }
                }
            }

            return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('publication/new.html.twig', [
            'publication' => $publication,
            'form' => $form,
        ]);
    }


    #[Route('/mod/image', name: 'publication_mod_image', methods: ['GET', 'POST'])]
    public function  modImage(Request $request, EntityManagerInterface $em)
    {
        $cpt = $request->query->get('cpt');
        $link = $this->renderView('publication/_mod_image.html.twig', array(
            'cpt' => $cpt,
        ));
        return new JsonResponse(['html' => $link]);
    }


    #[Route('/{id}', name: 'app_publication_show', methods: ['GET'])]
    public function show(Publication $publication): Response
    {
        return $this->render('publication/show.html.twig', [
            'publication' => $publication,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_publication_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Publication $publication, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('publication/edit.html.twig', [
            'publication' => $publication,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_publication_delete', methods: ['POST'])]
    public function delete(Request $request, Publication $publication, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$publication->getId(), $request->request->get('_token'))) {
            $entityManager->remove($publication);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
    }
}
