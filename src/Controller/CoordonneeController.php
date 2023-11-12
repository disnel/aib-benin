<?php

namespace App\Controller;

use App\Entity\Coordonnee;
use App\Form\CoordonneeType;
use App\Repository\CoordonneeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/coordonnee')]
class CoordonneeController extends AbstractController
{
    #[Route('/', name: 'app_coordonnee_index', methods: ['GET'])]
    public function index(CoordonneeRepository $coordonneeRepository): Response
    {
        return $this->render('coordonnee/index.html.twig', [
            'coordonnees' => $coordonneeRepository->findAll(),
        ]);
    }

    #[Route('/new/{id}', name: 'app_coordonnee_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,CoordonneeRepository $cr, $id= null): Response
    {
        $coordonnee = new Coordonnee();
        if( $id != ''){
            $coordonnee = $cr->find($id);
        }
        $form = $this->createForm(CoordonneeType::class, $coordonnee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($coordonnee);
            $entityManager->flush();

            return $this->redirectToRoute('app_coordonnee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('coordonnee/new.html.twig', [
            'coordonnee' => $coordonnee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coordonnee_show', methods: ['GET'])]
    public function show(Coordonnee $coordonnee): Response
    {
        return $this->render('coordonnee/show.html.twig', [
            'coordonnee' => $coordonnee,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_coordonnee_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Coordonnee $coordonnee, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CoordonneeType::class, $coordonnee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_coordonnee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('coordonnee/edit.html.twig', [
            'coordonnee' => $coordonnee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coordonnee_delete', methods: ['POST'])]
    public function delete(Request $request, Coordonnee $coordonnee, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coordonnee->getId(), $request->request->get('_token'))) {
            $entityManager->remove($coordonnee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_coordonnee_index', [], Response::HTTP_SEE_OTHER);
    }
}
