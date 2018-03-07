<?php

namespace Ramik\PdfLayoutGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paragraph
 */
class Paragraph extends Field
{
    public function getType(){
        return parent::getAvailableTypes()['PARAGRAPH'];
    }
}

