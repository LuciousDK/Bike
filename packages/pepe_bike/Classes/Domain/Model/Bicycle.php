<?php
declare (strict_types = 1);

namespace Luat\PepeBike\Domain\Model;

use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Bicycle extends AbstractEntity
{

    /**
     * @var \DateTime
     */
    protected $starttime;

    /**
     * @var \DateTime
     */
    protected $endtime;

    /**
     * @var bool
     */
    protected $hidden;

    /**
     * @var bool
     */
    protected $deleted;

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

    /**
     * Get hidden flag
     *
     * @return int
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set hidden flag
     *
     * @param int $hidden hidden flag
     *
     * @return  self
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * Get deleted flag
     *
     * @return int
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set deleted flag
     *
     * @param int $deleted deleted flag
     *
     * @return  self
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * Get start time
     *
     * @return \DateTime
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set start time
     *
     * @param \DateTime $starttime start time
     *
     * @return  self
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
        return $this;
    }

    /**
     * Get year of starttime
     *
     * @return int
     */
    public function getYearOfStarttime()
    {
        if ($this->getStarttime()) {
            return $this->getStarttime()->format('Y');
        }
    }

    /**
     * Get month of starttime
     *
     * @return int
     */
    public function getMonthOfStarttime()
    {
        if ($this->getStarttime()) {
            return $this->getStarttime()->format('m');
        }
    }

    /**
     * Get day of starttime
     *
     * @return int
     */
    public function getDayOfStarttime()
    {
        if ($this->starttime) {
            return (int) $this->starttime->format('d');
        }
    }

    /**
     * Get endtime
     *
     * @return \DateTime
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Set end time
     *
     * @param \DateTime $endtime end time
     *
     * @return  self
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
        return $this;
    }

    /**
     * Get year of endtime
     *
     * @return int
     */
    public function getYearOfEndtime()
    {
        if ($this->getEndtime()) {
            return $this->getEndtime()->format('Y');
        }
    }

    /**
     * Get month of endtime
     *
     * @return int
     */
    public function getMonthOfEndtime()
    {
        if ($this->getEndtime()) {
            return $this->getEndtime()->format('m');
        }
    }

    /**
     * Get day of endtime
     *
     * @return int
     */
    public function getDayOfEndtime()
    {
        if ($this->endtime) {
            return (int) $this->endtime->format('d');
        }
    }

}
