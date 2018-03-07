<?php

namespace Ramik\PdfLayoutGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Image
 *
 */
class Image extends Field
{
    /* @ORM\Column(type="string")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gf" })
     */
    private $image;

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getType()
    {
        return parent::getAvailableTypes()['Image'];
    }
}

