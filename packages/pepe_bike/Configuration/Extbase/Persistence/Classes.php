<?php
declare(strict_types = 1);

if (!defined('TYPO3')) {
    die('Access denied.');
}

return [
    \Luat\PepeBike\Domain\Model\Bicycle::class => [
        'tableName' => 'tx_pepebike_domain_model_bicycle',
    ],
    \Luat\PepeBike\Domain\Model\Brand::class => [
        'tableName' => 'tx_pepebike_domain_model_brand',
    ],
    // \T3G\AgencyPack\Blog\Domain\Model\Comment::class => [
    //     'tableName' => 'tx_blog_domain_model_comment',
    //     'properties' => [
    //         'post' => [
    //             'fieldName' => 'parentid'
    //         ],
    //     ],
    // ],
    // \T3G\AgencyPack\Blog\Domain\Model\Tag::class => [
    //     'tableName' => 'tx_blog_domain_model_tag',
    // ],
    // \T3G\AgencyPack\Blog\Domain\Model\Author::class => [
    //     'tableName' => 'tx_blog_domain_model_author',
    // ],
];
