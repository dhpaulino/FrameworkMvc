<?php

namespace FrameworkMvc\Mvc;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author pet
 */
class View {

    private $layout;
    public $data;
    private $viewPath;

    public function render(array $data) {

        $this->data = $data;

        include $this->viewPath;
    }

    public function setViewPath($viewPath) {
        $this->viewPath = $viewPath;
    }

    public function getLayout() {
        return $this->layout;
    }

    public function setLayout($layout) {
        $this->layout = $layout;
    }

}

?>
