<?php
namespace FrontEnd\Controller;

use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

class AController extends AbstractActionController{
    
    public function indexAction(){
        return new ViewModel();
    }
}