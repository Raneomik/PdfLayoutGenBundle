<?php

namespace Raneomik\PdfLayoutGenBundle\Services;


use Raneomik\PdfLayoutGenBundle\Form\LineType;
use Raneomik\PdfLayoutGenBundle\Form\ParagraphType;
use Raneomik\PdfLayoutGenBundle\Form\LinkType;
use Raneomik\PdfLayoutGenBundle\Form\ImageType;
use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Component\Form\FormFactory;

class TypeHandler
{
    /** @var TwigEngine $twig */
    private $twig;

    /** @var FormFactory $formFatory */
    private $formFatory;

    function __construct(TwigEngine $twig, FormFactory $formFatory)
    {
        $this->twig = $twig;
        $this->formFatory = $formFatory;
    }

    public function getPrototype($type){
        switch($type){
            case 'LINE':
                $form = $this->formFatory->create(LineType::class);
                break;

            case 'LINK':
                $form = $this->formFatory->create(LinkType::class);
                break;

            case 'PARAGRAPH':
                $form = $this->formFatory->create(ParagraphType::class);
                break;

            case 'IMAGE':
                $form = $this->formFatory->create(ImageType::class);
                break;
        }

        return $this->twig->render(
            '@PdfLayoutGen/PdfLayout/prototype.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}