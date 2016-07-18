<?php
namespace FrontEnd;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Permissions\Acl\Acl;
use Zend\Session\Container;

class Module{
    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig(){
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap(MvcEvent $e){
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array(
            $this,
            'checkAuthAcl'
        ), 100);
    }

    public function checkAuthAcl(MvcEvent $event){
        $acl = new Acl();

        //gia su nhu dang load tu database len RoleResource
        $resources = array(
            "FrontEnd\\Controller\\Index",
            "FrontEnd\\Controller\\A",
            "FrontEnd\\Controller\\B"
        );
        
        //add resource vao ACL
        foreach($resources as &$resource){
            $acl->addResource($resource);
        }
        
        
        //load tu database, quan he giua role-resource
        $roleResource = array(
            "admin" => [
                "FrontEnd\\Controller\\Index",
                "FrontEnd\\Controller\\A",
                "FrontEnd\\Controller\\B"
            ],
            "member" => [
                "FrontEnd\\Controller\\Index",
                "FrontEnd\\Controller\\A"
            ],
            "guest" => ["FrontEnd\\Controller\\Index"]
        );

        //allow role o dau, resoource
        foreach($roleResource as $role => &$resources){
            $acl->addRole($role);
            foreach($resources as &$resource){
                $acl->allow($role, $resource);
            }
        }

        
        //load tu database len, quen he giua user-role
        $userRole = array(
            "hung" => "admin",
            "anh" => "member",
        );

        
        //sau khi user logined, luu vao session, doc ra
        $container = new Container("ABC");
        $user = $container->offsetGet("user");

        //neu user chua login (lan dau vao, mac dinh la "guest")
        $role = "guest";
        if($user){
            $role = $userRole[$user];
        }

        
        //doc xem user dang truy cap vao dau
        $controller = $event->getRouteMatch()->getParam('controller');
        $action = $event->getRouteMatch()->getParam('action');

        if(!$acl->isAllowed($role, $controller)){
            die("sorry, ban ko co quyen truy cap vao day");
        }

        var_dump($role, $controller, $action);

    }
}