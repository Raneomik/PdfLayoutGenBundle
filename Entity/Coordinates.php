<?php

namespace Raneomik\PdfLayoutGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coordinates
 * @ORM\Table(name="field_coordinates")
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 */
class Coordinates
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pdf_field_x_position", type="float")
     */
    private $x_position;

    /**
     * @var string
     *
     * @ORM\Column(name="pdf_field_y_position", type="float")
     */
    private $y_position;

    /**
     * @var string
     *
     * @ORM\Column(name="pdf_field_height", type="float")
     */
    private $height;


    /**
     * @var string
     *
     * @ORM\Column(name="pdf_field_width", type="float")
     */
    private $width;

    /**
     * @ORM\OneToOne(targetEntity="Field", mappedBy="coordinates")
     * @ORM\JoinColumn(name="field_id", referencedColumnName="id")
     */
    private $field;

    /**
     * @return Field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param Field $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return string
     */
    public function getXPosition()
    {
        return $this->x_position;
    }

    /**
     * @param string $x_position
     */
    public function setXPosition($x_position)
    {
        $this->x_position = $x_position;
    }

    /**
     * @return string
     */
    public function getYPosition()
    {
        return $this->y_position;
    }

    /**
     * @param string $y_position
     */
    public function setYPosition($y_position)
    {
        $this->y_position = $y_position;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
}

