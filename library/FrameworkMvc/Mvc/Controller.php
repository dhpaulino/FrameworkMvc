<?php

namespace FrameworkMvc\Mvc;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author pet
 */
class Controller {

    /**
     *
     * @var View 
     */
    private $view;

    public function __construct() {
        $this->view = new View();
    }

    public function getView() {
        return $this->view;
    }

}

?>
