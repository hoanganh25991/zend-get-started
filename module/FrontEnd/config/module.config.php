<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'FrontEnd\Controller\Index' => 'FrontEnd\Controller\IndexController',
            'FrontEnd\Controller\A' => 'FrontEnd\Controller\AController',
            'FrontEnd\Controller\B' => 'FrontEnd\Controller\BController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'join' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/join',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Index',
                        'action' => 'join',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Index',
                        'action' => 'login',
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Index',
                        'action' => 'logout',
                    ),
                ),
            ),

            //test phan quyen
            'a' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin-controller',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\A',
                        'action' => 'index',
                    ),
                ),
            ),
            'b' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/backend-controller',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\B',
                        'action' => 'index',
                    ),
                ),
            ),
            
        ),
    ),
    // ViewManager configuration
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        // Doctype with which to seed the Doctype helper
        'doctype' => 'HTML5',
        // e.g. HTML5, XHTML1

        // Layout template name
        'layout' => 'InspiredByBoostrap',
        // e.g. 'layout/layout'

        // TemplateMapResolver configuration
        // template/path pairs
        'template_map' => array(
            'InspiredByBoostrap' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),

        // TemplatePathStack configuration
        // module/view script path pairs
        'template_path_stack' => array(
            'FrontEnd\view' => __DIR__ . '/../view',
        ),
        // Additional strategies to attach
        // These should be class names or service names of View strategy classes
        // that act as ListenerAggregates. They will be attached at priority 100,
        // in the order registered.
        'strategies' => array(
            'ViewJsonStrategy',
            // register JSON renderer strategy
            'ViewFeedStrategy',
            // register Feed renderer strategy
        ),
    ),
);
