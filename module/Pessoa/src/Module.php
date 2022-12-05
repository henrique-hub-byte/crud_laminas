<?php

namespace Pessoa;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Db\ResultSet\ResultSet;
use Pessoa\Controller\PessoaController;
use Pessoa\Model\PessoaTable;

class Module implements ConfigProviderInterface
{

    public function getConfig()
    /* metodo do zend */
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\PessoaTable::class => function ($container) {
                    $tableGateway = $container->get(Model\PessoaTableGateway::class);
                    return new PessoaTable($tableGateway);
                }, 
                Model\PessoaTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Pessoa());
                    return new TableGateway('pessoa', $dbAdapter, null, $resultSetPrototype);
                },
            ]
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                PessoaController::class => function($container) {
                    $tableGateway = $container->get(Model\PessoaTable::class);
                    return new PessoaController($tableGateway);
                },
            ]
        ];
    }
}
