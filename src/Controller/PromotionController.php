<?php

namespace App\Controller;

use App\Entity\Promotion;
use App\Form\PromotionType;
use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionController extends AbstractController
{
    /**
     * @Route("/promotion", name="promotion")
     */
    public function index(PromotionRepository $repo): Response
    {
        $promotions = $repo->findAll();
        return $this->render('promotion/index.html.twig', [
            'controller_name' => 'PromotionController',
            'promotions' => $promotions,
        ]);
    }

    /**
     * @Route("/addPromo", name="addPromotion")
     */
    public function addPromo(Request $request): Response
    {
        $promo = new Promotion();
        $form = $this->createForm(PromotionType::class,$promo);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $promo->setIdFormation($data->getFormation()->getId());
            $em->persist($promo);
            $em->flush();
            return $this->redirectToRoute('promotion');
        }

        return $this->render('promotion/addPromotion.html.twig', [
            'formPromo' => $form->createView(),
        ]);
    }
    /**
     * @Route("/promotion/{id}/editPromotion", name="editPromotion")
     */
    public function edit(Request $request,PromotionRepository $repo,$id): Response
    {
        $promo = $repo->find($id);
        $form = $this->createForm(PromotionType::class,$promo);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->persist($promo);
            $em->flush();
            return $this->redirectToRoute('promotion');
        }
        return $this->render('promotion/addPromotion.html.twig', [
            'formPromo' => $form->createView(),

        ]);
    }
    /**
     * @Route("/promotion/{id}/deletePromotion", name="deletePromotion")
     */
    public function deleteEvent(Request $request,PromotionRepository $repo,$id): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $calendar = $repo->find($id);
        $entityManager->remove($calendar);
        $entityManager->flush();


        return $this->redirectToRoute('promotion');
    }
}