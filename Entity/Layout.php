<?php

namespace Ramik\PdfLayoutGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Layout
 *
 * @ORM\Table(name="pdf_layout")
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 */
class Layout
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
     * @ORM\OneToMany(targetEntity="Field", mappedBy="layout")
     * @var ArrayCollection $fields
     */
    private $fields;

    /**
     * @return ArrayCollection
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param ArrayCollection $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function __construct()
    {
        $this->fields = new ArrayCollection();
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
     * @param Field $field
     */
    public function addField(Field $field)
    {
        if(!$this->fields->contains($field)) {
            $this->fields->add($field);
            $field->setLayout($this);
        }
    }

    /**
     * @param Field $field
     */
    public function removeField(Field $field)
    {
        if($this->fields->contains($field))
            $this->fields->remove($field);
    }

}

