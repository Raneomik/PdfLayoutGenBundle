<?php

namespace Raneomik\PdfLayoutGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Line
 * @ORM\Entity
 * @ORM\Table(name="field_link")
 */
class Link extends Field
{
    /**
     * @ORM\Column(type="string")
    */
    private $content;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent( $content )
    {
        $this->content = $content;
    }

    public function getType(){
        return 'link';
    }
}

