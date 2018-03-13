<?php

namespace Ramik\PdfLayoutGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Field
 * @ORM\Table(name="pdf_field")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "line" = "Line",
 *     "paragraph" = "Paragraph",
 *     "link" = "Link",
 *     "image" = "Image"
 * })
 */
abstract class Field
{

    private static $availableTypes = [
        'LINE' => 'simple line',
        'LINK' => 'linked line',
        'PARAGRAPH' => 'paragraph',
        'IMAGE' => 'image',
    ];

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
     * @ORM\Column(name="pdf_field_type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="pdf_field_name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Layout", inversedBy="fields")
     * @ORM\JoinColumn(name="layout_id", referencedColumnName="id")
     */
    private $layout;
    /**
     * @ORM\OneToOne(targetEntity="Coordinates", inversedBy="field")
     * @ORM\JoinColumn(name="coordinate_id", referencedColumnName="id")
     */
    private $coordinates;

    /**
     * @return mixed
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param mixed $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
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
     * Set type
     *
     * @param string $type
     *
     * @return Field
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
 /**
  * @return string
  */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return array
     */
    public static function getAvailableTypes()
    {
        return self::$availableTypes;
    }
}

