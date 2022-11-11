<?php
declare (strict_types = 1);

namespace Luat\PepeBike\Domain\Repository;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Model\Brand;
use TYPO3\CMS\Extbase\Persistence\Repository;

class BicycleRepository extends Repository
{
    /**
     * @param Brand $brand
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findAllByBrand(Brand $brand)
    {
        $query = $this->createQuery();
        $constraints = [];
        $constraints[] = $query->equals('brand', $brand->getUid());
        $constraints = $this->fillConstraintsBySettings($query, $constraints);
        return $query->matching($query->logicalAnd($constraints))->execute();
    }

    /**
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findAllIncludingHiddenAndDeleted()
    {
        $query = $this->createQuery();
        $query->getQuerySettings()
            ->setIgnoreEnableFields(true)
            ->setEnableFieldsToBeIgnored(['disabled'])
            ->setIncludeDeleted(true);
        return $query->execute();
    }

    /**
     * @return Bicycle
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findByUidIncludingHidden(int $uid): Bicycle
    {
        $query = $this->createQuery();
        $query->getQuerySettings()
            ->setIgnoreEnableFields(true)
            ->setEnableFieldsToBeIgnored(['disabled']);
        $constraints = [];
        $constraints[] = $query->equals('uid', (int) $uid);
        $bicycle = $query->matching($query->logicalAnd($constraints))->execute()->getFirst();
        return $bicycle;
    }
    /**
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findAllIncludingHidden()
    {
        $query = $this->createQuery();
        $query->getQuerySettings()
            ->setIgnoreEnableFields(true)
            ->setEnableFieldsToBeIgnored(['disabled']);
        return $query->execute();
    }

    /**
     * @param int|Bicycle $bicycle
     * @param null|bool $status
     * @return Bicycle
     */
    public function changeHiddenStatus($bicycle, ?bool $status = null): ?Bicycle
    {
        if (is_int($bicycle)) {
            $bicycle = $this->findByUidIncludingHidden((int) $bicycle);
        }
        if (!($bicycle instanceof Bicycle) || $bicycle == null) {
            return null;
        }
        if ($status == null) {
            $status = !$bicycle->getHidden();
        }

        $bicycle->setHidden($status);
        $this->update($bicycle);
        return $bicycle;

    }

    /**
     * @param int|Bicycle $bicycle
     * @param array $data
     * @return Bicycle
     */
    public function updateBicycleData($bicycle, array $data): ?Bicycle
    {
        if (is_int($bicycle)) {
            $bicycle = $this->findByUidIncludingHidden((int) $bicycle);
        }
        if (!($bicycle instanceof Bicycle) || $bicycle == null) {
            return null;
        }
        if ($data == null) {
            return null;
        }
        foreach ($data as $key => $value) {

            if (method_exists($bicycle, 'set' . ucwords($key))) {
                $bicycle->{'set' . ucwords($key)}($value);}
        }
        return $bicycle;

    }
}
