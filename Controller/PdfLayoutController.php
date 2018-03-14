<?php

namespace Raneomik\PdfLayoutGenBundle\Controller;

use Raneomik\PdfLayoutGenBundle\Form\LayoutType;
use Raneomik\PdfLayoutGenBundle\Entity\Layout;
use Raneomik\PdfLayoutGenBundle\Entity\Line;
use Raneomik\PdfLayoutGenBundle\Entity\Field;
use Raneomik\PdfLayoutGenBundle\Entity\Paragraph;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PdfLayoutController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('@PdfLayoutGen/PdfLayout/index.html.twig');
    }

    /**
     * @Route("/create-pdf")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(LayoutType::class, new Layout());

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($form->getData());
            $em->flush();
        }

        return $this->render('@PdfLayoutGen/PdfLayout/new.html.twig',[
            'form' => $form->createView(),
            'field_types' => Field::getAvailableTypes()
        ]);
    }


    /**
     * @Route("/prototype/{type}")
     */
    public function handlePrototypeAction(Request $request, $type)
    {
        $typeHandler = $this->get('pdf_layout_gen.handle_type');
        $response = new Response();
        $response->setContent($typeHandler->getPrototype($type));
        return $response;
    }
}
