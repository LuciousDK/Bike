<?php
declare (strict_types = 1);

namespace Luat\PepeBike\Domain\Model;

use \TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Client extends FrontendUser
{


    /**
     * @var ObjectStorage<Bicycle>
     */
    protected $bicycles;


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
    public function setBicycles(ObjectStorage $bicycles): Client
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
    public function addBicycle(Bicycle $bicycle): Client
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
    public function removeBicycle(Bicycle $bicycle): Client
    {
        $this->bicycles->detach($bicycle);

        return $this;
    }

}
