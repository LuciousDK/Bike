<?php

namespace Luat\PepeBike\Mvc\View;

use TYPO3\CMS\Extbase\Mvc\View\JsonView as ExtbaseJsonView;

class JsonView extends ExtbaseJsonView
{
    /**
     * @var array
     */
    protected $configuration = [
        'bicycles' => [
            '_descendAll' => [
                '_only' => ['color', 'model', 'wheels', 'brand', 'clients'],
                '_descend' => [
                    'clients' => [
                        '_descendAll' => [
                            '_only' => ['name', 'firstName', 'middleName', 'lastName', 'username'],
                        ],
                    ],
                    'brand' => [
                        '_only' => ['uid', 'name'],
                    ],
                ],
            ],
        ],
        'bicycle' => [
            '_descendAll' => [
                '_only' => ['color', 'model', 'wheels', 'brand', 'clients'],
                '_descend' => [
                    'clients' => [
                        '_descendAll' => [
                            '_only' => ['name', 'firstName', 'middleName', 'lastName', 'username'],
                        ],
                    ],
                    'brand' => [
                        '_only' => ['uid', 'name'],
                    ],
                ],
            ],
        ],
        'brands' => [
            '_descendAll' => [
                '_only' => ['uid', 'name', 'bicycles'],
                '_descend' => [
                    'bicycles' => [
                        '_descendAll' => [
                            '_only' => ['color', 'model', 'wheels', 'clients'],
                            '_descend' => [
                                'clients' => [
                                    '_only' => ['name', 'firstName', 'middleName', 'lastName', 'username'],

                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'brand' => [
            '_descendAll' => [
                '_only' => ['uid', 'name', 'bicycles'],
                '_descend' => [
                    'bicycles' => [
                        '_descendAll' => [
                            '_only' => ['color', 'model', 'wheels', 'clients'],
                            '_descend' => [
                                'clients' => [
                                    '_only' => ['name', 'firstName', 'middleName', 'lastName', 'username'],

                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'clients' => [
            '_descendAll' => [
                '_only' => ['name', 'firstName', 'middleName', 'lasstName', 'bicycles'],
                '_descend' => [
                    'bicycles' => [
                        '_descendAll' => [
                            '_only' => ['color', 'model', 'wheels', 'brand'],
                            '_descend' => [
                                'brand' => [
                                    '_only' => ['uid', 'name'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'client' => [
            '_descendAll' => [
                '_only' => ['name', 'firstName', 'middleName', 'lasstName', 'bicycles'],
                '_descend' => [
                    'bicycles' => [
                        '_descendAll' => [
                            '_only' => ['color', 'model', 'wheels', 'brand'],
                            '_descend' => [
                                'brand' => [
                                    '_only' => ['uid', 'name'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
}
