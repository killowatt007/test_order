<?php
namespace lib\mvc;
defined('EXE') or die('Access');

class Controller {
    protected function render($viewName, $args = [], $parent = 'tmpls/main') {
        if ($viewPath = $this->getViewPath($viewName)) {
            ob_start();

            foreach ($args as $key => $value) {
                $$key = $value;
            }
            include $viewPath;

            $content = ob_get_clean();
        }
        else {
            $content = '';
        }

        if ($viewPathMain = $this->getViewPath($parent)) {
            include $viewPathMain;
        }
    }

    protected function getModel($modelName) {
        $model = false;
        $modelClass = '\models\\' . ucfirst($modelName);
        $modelPath = ROOT . '/models/' . $modelName . '.php';

        if (file_exists($modelPath)) {
            include_once ROOT . '/lib/mvc/model.php';
            include $modelPath;

            if (class_exists($modelClass)) {
                $model = new $modelClass();
            }
        }

        return $model;
    }

    private function getViewPath($name) {
        $path = ROOT . '/views/' . $name . '.php';
        return file_exists($path) ? $path : false;
    }
}