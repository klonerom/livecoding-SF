<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ecole;
use AppBundle\Entity\Eleve;
use AppBundle\Form\EcoleType;
use AppBundle\Images\ImageManipulator;
use claviska\SimpleImage;
use Monolog\Logger;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EcoleController extends Controller
{
    /**
     * @Route("/ecoles", name="ecoles")
     */
    public function index()
    {
        return new Response('[Listing ecoles]');
    }


    /**
     * @Route("/ecoles/new", name="ecoles.new")
     */
    public function create(Request $request, ImageManipulator $imageManipulator)
    {
        $form = $this->createForm(EcoleType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Ecole $ecole */
            $ecole = $form->getData();
            $imageManipulator->handleUploadedEcolePicture($ecole);

            $this->getDoctrine()->getManager()->persist($ecole);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecoles');
        }

        // replace this example code with whatever you need
        return $this->render('ecole/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
