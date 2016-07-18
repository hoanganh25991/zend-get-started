<?php
namespace FrontEnd\Controller;

use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{
    
    protected $view;
    protected $users;
    
    public function __construct(){
        $this->view = new ViewModel();

        //thay vi doc database len
        //hard code cho ban de hieu truoc
        $this->users = array(
            "hung" => "87cfe89dd6e63c2ae0a206cecc4c3b64",
            "anh" => "b710b378de7ef5133b97bd2c9464ffe3",
        );
    }

    public function indexAction(){
        return new ViewModel();
    }

    public function loginAction(){
        /** @var Request $request */
        $request = $this->getRequest();

        if($request->isPost()){
            //check user name
            $name = $request->getPost("name");

            if(!isset($this->users[$name])){
                die("wrong name");
            }

            //check user pass
            $pass = $request->getPost("pass");
            if($this->users[$name] == md5($pass)){
                //luu vao section truoc
                $container = new Container("ABC");
                $container->offsetSet("user", $name);
                return $this->redirect()->toRoute("home");
            }

            die("wrong pass");
        }
        
        return $this->view;
    }

    public function logoutAction(){
        $container = new Container("ABC");
        if($container->offsetExists("user")){
            $container->offsetUnset("user");
        }
        return $this->redirect()->toRoute("login");
    }
}