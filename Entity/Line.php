<?php

namespace Ramik\PdfLayoutGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Line
 *
 */
class Line extends Field
{
    private $content;

    public function getType(){
        return parent::getAvailableTypes()['LINE'];
    }
}

