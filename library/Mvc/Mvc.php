<?php

namespace Mvc;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mvc
 *
 * @author pet
 */
class Mvc {

    /**
     *
     * @var Controller 
     */
    private $controller;

    /**
     *
     * @var Mvc 
     */
    private static $instace;

    private function __construct() {
        
    }

    public function run() {

        $controllerName = ucfirst($_GET['controller']);
        $controllerPath = 'Controller\\' . $controllerName . 'Controller';


        $actionName = $_GET['action'];
        $actionMethodName = $actionName.'Action';

        $this->controller = new $controllerPath;
        
        $data = $this->controller->$actionMethodName();
        $this->controller->getView()->render($data);
    }

    public static function getInstace() {

        if (self::$instace == null) {
            self::$instace = new Mvc();
        }

        return self::$instace;
    }

}

?>
