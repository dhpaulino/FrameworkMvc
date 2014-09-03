<?php

namespace FrameworkMvc\Mvc;

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


        if (isset($_GET['module']) && isset($_GET['controller']) && isset($_GET['action'])) {

            $moduleName = ucfirst($_GET['module']);

            $controllerName = ucfirst($_GET['controller']);
            $controllerFullName = $moduleName . '\\'
                    . 'Controller' . '\\'
                    . $controllerName . 'Controller';


            $actionName = strtolower($_GET['action']);
            $actionMethodName = $actionName . 'Action';

       

            if (class_exists($controllerFullName)) {


                $this->controller = new $controllerFullName();


                if (method_exists($this->controller, $actionMethodName)) {
                    $data = $this->controller->$actionMethodName();

                    $viewPath = 'module' . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR
                            . 'View' . DIRECTORY_SEPARATOR
                            . lcfirst($controllerName) . DIRECTORY_SEPARATOR . $actionName . '.php';

                    if (file_exists($viewPath)) {
                        $this->controller->getView()->setViewPath($viewPath);
                        $this->controller->getView()->render($data);
                    } else {
                        throw new \Exception("View for action {$actionName} of {$controllerName} not found");
                    }
                } else {
                    throw new \Exception("Action  {$actionName} not found into {$controllerFullName}");
                }
            } else {
                
                throw new \Exception("Controller {$controllerFullName} not found");
            }
        } else {

            throw new \Exception('Invalid Route');
        }
    }

    /**
     * 
     * @return Mvc
     */
    public static function getInstace() {

        if (self::$instace == null) {
            self::$instace = new Mvc();
        }

        return self::$instace;
    }

}

?>
