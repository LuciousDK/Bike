<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Domain\Model;

use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use \TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Brand extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var ObjectStorage<Bicycle>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $bicycles;


    /**
     * Brand constructor.
     */
    public function __construct()
    {
        $this->initializeObject();
    }

    /**
     * initializeObject
     */
    public function initializeObject(): void
    {
        $this->bicycles = new ObjectStorage();
    }


    /**
     * Get $name
     *
     * @return  string
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set $name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name): Brand
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Get $bicycles
     *
     * @return  ObjectStorage<Bicycle>
     */ 
    public function getBicycles(): ObjectStorage
    {
        return $this->bicycles;
    }

    /**
     * Set $bicycles
     *
     * @param  ObjectStorage<Bicycle>  $bicycles 
     *
     * @return  self
     */ 
    public function setBicycles(ObjectStorage $bicycles): Brand
    {
        $this->bicycles = $bicycles;

        return $this;
    }

    /**
     * Add a bicycle to this brand
     *
     * @param  Bicycle  $bicycle
     *
     * @return  self
     */ 
    public function addBicycle(Bicycle $bicycle): Brand
    {
        $this->bicycles->attach($bicycle);

        return $this;
    }

    /**
     * Remove a bicycle to this brand
     *
     * @param  Bicycle  $bicycle
     *
     * @return  self
     */ 
    public function removeBicycle(Bicycle $bicycle): Brand
    {
        $this->bicycles->detach($bicycle);

        return $this;
    }
}
