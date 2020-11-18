<?php

namespace App\Controller;

use App\Entity\Call;
use App\Form\CallType;
use App\Form\SearchCallType;
use App\Repository\CallRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/call")
 */
class CallController extends AbstractController
{
    /**
     * @Route("/", name="call_index", methods={"GET","POST"})
     */
    public function index(Request $request, CallRepository $callRepository): Response
    {
        $calls = $callRepository->findAll();
        $form = $this->createForm(SearchCallType::class);
        $search = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $calls = $callRepository->search(

                $search->get('status')->getData()
            );
        }

        return $this->render('call/index.html.twig', [
                'calls' => $calls,
                'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="call_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $call = new Call();
        $form = $this->createForm(CallType::class, $call);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($call);
            $entityManager->flush();

            return $this->redirectToRoute('call_index');
        }

        return $this->render('call/new.html.twig', [
            'call' => $call,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="call_show", methods={"GET"})
     */
    public function show(Call $call): Response
    {
        return $this->render('call/show.html.twig', [
            'call' => $call,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="call_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Call $call): Response
    {
        $form = $this->createForm(CallType::class, $call);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('call_index');
        }

        return $this->render('call/edit.html.twig', [
            'call' => $call,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="call_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Call $call): Response
    {
        if ($this->isCsrfTokenValid('delete'.$call->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($call);
            $entityManager->flush();
        }

        return $this->redirectToRoute('call_index');
    }


}
