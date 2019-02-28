<?php 
namespace Train;

/**
 * summary
 */

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    /**
     * summary
     */
    /*
    public function onBootstrap()
    {
        
    }*/

    public function getConfig()
    {
    	return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
    	return array(
           'Zend\Loader\StandardAutoloader' => array(
               'namespaces' => array(
                   __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
               ),
           ),
       );
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\AlbumTable::class => function($container)
                {
                    $tableGateway = $container->get(Model\AlbumTableGateway::class);
                    return new Model\AlbumTable($tableGateway);
                },
                Model\AlbumTableGateway::class => function($container)
                {
                    $adapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Album);
                    return new TableGateway('album',$adapter,null,$resultSetPrototype);    
                }
            ]
        ];
    }


    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\IndexController::class => function($container)
                {
                    return new Controller\IndexController($container->get(Model\AlbumTable::class));
                }
            ]
        ];
    }

}

?>