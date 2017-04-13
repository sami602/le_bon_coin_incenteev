<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localisation
 */
class Localisation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $city;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $publications;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->publications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Localisation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Add publications
     *
     * @param \AppBundle\Entity\Publication $publications
     * @return Localisation
     */
    public function addPublication(\AppBundle\Entity\Publication $publications)
    {
        $this->publications[] = $publications;

        return $this;
    }

    /**
     * Remove publications
     *
     * @param \AppBundle\Entity\Publication $publications
     */
    public function removePublication(\AppBundle\Entity\Publication $publications)
    {
        $this->publications->removeElement($publications);
    }

    /**
     * Get publications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPublications()
    {
        return $this->publications;
    }
    /**
     * To string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getCity();
    }
}
