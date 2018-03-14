<?php

namespace Raneomik\PdfLayoutGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="field_image")
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
        return 'image';
    }
}

