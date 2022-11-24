<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Backend;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ItemsProcFunc
{
    /**
     *
     * @param array &$config configuration array
     */
    public function clientOptions(&$config)
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('fe_users')->createQueryBuilder();
        $result = $queryBuilder->select('uid','username','name','first_name','tx_pepebike_bicycles')->from('fe_users')
            // ->where($queryBuilder->expr()->gte('tx_pepebike_bicycles', 1))
            ->execute();

        $options = [];

        while ($row = $result->fetch()) {
            $label = $row['first_name'] ? $row['first_name'] : '';
            $label = $label ? $label : $row['name'];
            $label = $label ? $label : $row['username'];

            $label .= ' ('.$row['tx_pepebike_bicycles'] .')';

            array_push($options, [$label,$row['uid']]);
        }

        if (!is_array($config['items'])) {
            $config['items'] = $options;
        } else {
            $config['items'] = array_merge($config['items'], $options);
        }
    }
}
