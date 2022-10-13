<?php
declare (strict_types = 1);

namespace Luat\PepeBike\Domain\Model;

use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Bicycle extends AbstractEntity
{
    /**
     * @var string
     */
    protected $color;

    /**
     * @var Brand
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $brand;

    /**
     * @var int
     */
    protected $wheels;

    /**
     * @var string
     */
    protected $model;


    /**
     * Get the value of model
     *
     * @return  string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @param  string  $model
     *
     * @return  self
     */
    public function setModel(string $model): Bicycle
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of wheels
     *
     * @return  int
     */
    public function getWheels(): int
    {
        return $this->wheels;
    }

    /**
     * Set the value of wheels
     *
     * @param  int  $wheels
     *
     * @return  self
     */
    public function setWheels(int $wheels): Bicycle
    {
        $this->wheels = $wheels;

        return $this;
    }

    /**
     * Get the value of color
     *
     * @return  string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @param  string  $color
     *
     * @return  self
     */
    public function setColor(string $color): Bicycle
    {
        $this->color = $color;

        return $this;
    }


    /**
     * Get the value of brand
     *
     * @return  Brand
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @param  Brand  $brand
     *
     * @return  self
     */ 
    public function setBrand(Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }
}
