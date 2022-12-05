<?php

    namespace Pessoa;

    
    use Laminas\ServiceManager\Factory\InvokableFactory;
    use Laminas\Router\Http\Segment;

    return [
        'router' => [
            'routes' => [
                'pessoa' => [
                    'type' => Segment::class,
                    'options' => [
                        'route' => '/pessoa[/:action[/:id]]',
                        'constraints' => [
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'id' => '[0-9]+'
                        ],
                        'defaults' => [
                            'controller' => Controller\PessoaController::class,
                            'action' => 'index',
                        ],
                    ],
                ],
            ],
        ],
        'controllers' => [
            'factories' => [
            //	Controller\PessoaController::class => InvokableFactory::class,
            ],
        ],
        'view_manager' => [
            'template_path_stack' => [
               'pessoa' => __DIR__ . '/../view',
            ],
        ],
        'db' => [
            'driver' => 'Pdo_Mysql',
            'database' => 'text_zend',
            'username' => 'root',
            'password' => 'Anfield_893',
            'hostname' => 'localhost',
        ]
    ];
