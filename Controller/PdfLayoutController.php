<?php

namespace Raneomik\PdfLayoutGenBundle\Controller;

use Raneomik\PdfLayoutGenBundle\Form\LayoutType;
use Raneomik\PdfLayoutGenBundle\Entity\Layout;
use Raneomik\PdfLayoutGenBundle\Entity\Line;
use Raneomik\PdfLayoutGenBundle\Entity\Field;
use Raneomik\PdfLayoutGenBundle\Entity\Paragraph;
use Raneomik\PdfLayoutGenBundle\PdfLayoutGenBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PdfLayoutController extends Controller
{
    
    
    /**
     * @Route("/list",name="layout_list")
     */
    public function listAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');


        return $this->render('@PdfLayoutGen/PdfLayout/list.html.twig',[
            'pdf_layouts' => $em->getRepository(Layout::class)->findAll(),
        ]);
    }

    /**
     * @Route("/delete/{id}",name="layout_delete")
     * @param $id
     * @param Request $request
     * @return
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $layout = $em->getRepository(Layout::class)->findOneById($id);
        $em->remove($layout);
        $em->flush();

        return $this->render('@PdfLayoutGen/PdfLayout/list.html.twig',[
            'pdf_layouts' => $em->getRepository(Layout::class)->findAll(),
        ]);
    }
    
    
    /**
     * @Route("/create-pdf",name="layout_create")
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
     * @Route("/prototype/{type}",name="layout_prototype")
     */
    public function handlePrototypeAction(Request $request, $type)
    {
        $typeHandler = $this->get('pdf_layout_gen.handle_type');
        $response = new Response();
        $response->setContent($typeHandler->getPrototype($type));
        return $response;
    }
}
