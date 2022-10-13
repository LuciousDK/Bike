<?php
declare(strict_types = 1);

namespace Luat\PepeBike\Domain\Repository;

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
    public function findAllByPost(Brand $brand)
    {
        $query = $this->createQuery();
        $constraints = [];
        $constraints[] = $query->equals('brand', $brand->getUid());
        $constraints = $this->fillConstraintsBySettings($query, $constraints);
        return $query->matching($query->logicalAnd($constraints))->execute();
    }


}
