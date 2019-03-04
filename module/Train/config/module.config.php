<?php 

namespace Train;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
	'router' => [
		'routes' => [
			// 'home' => [
			// 	'type' => Literal::class,
			// 	'options' => [
			// 		'route'    => '/',
			// 		'defaults' => [
			// 			'controller' => Controller\IndexController::class,
			// 			'action'     => 'index',
			// 		],
			// 	],
			// ],
			'train' => [
				'type'    => 'segment',
				'options' => [
					'route'    => '/train[/:action][/:id]',
					'constraints' => [
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ],
					'defaults' => [
						'controller' => Controller\IndexController::class,
						'action'     => 'index',
					],
				],
			],
		],
	],
	'controllers' => [
		'factories' => [
			//Controller\IndexController::class => InvokableFactory::class,
		]
	],
	'view_manager' => [
		'template_path_stack' => [
				__DIR__.'/../view'		
		]
	],		
];

?>