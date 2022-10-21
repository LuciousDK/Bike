<?php
declare (strict_types = 1);

namespace Luat\PepeBike\Domain\Model;

use \TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Client extends FrontendUser
{


    /**
     * @var ObjectStorage<Bicycle>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $bicycles;


    /**
     * initializeObject
     */
    public function initializeObject(): void
    {
        parent::initializeObject();
        $this->bicycles = $this->bicycles ?? new ObjectStorage();
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
     * @param  ObjectStorage<Bicycle> $bicycles 
     *
     * @return  self
     */ 
    public function setBicycles(ObjectStorage $bicycles): self
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
    public function addBicycle(Bicycle $bicycle): self
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
    public function removeBicycle(Bicycle $bicycle): self
    {
        $this->bicycles->detach($bicycle);

        return $this;
    }

}
