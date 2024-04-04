<?php
namespace lib;
defined('EXE') or die('Access');

class Router {
    public function route() {
        $controllerName = isset($_SERVER['REDIRECT_URL']) ? explode('/', $_SERVER['REDIRECT_URL'])[1] : 'home';
        $action = $_GET['action'] ?? 'index';

        $controllerClass = '\controllers\\' . ucfirst($controllerName);
        $controllerPath = ROOT . '/controllers/' . $controllerName . '.php';

        if (file_exists($controllerPath)) {
            include ROOT . '/lib/mvc/controller.php';
            include $controllerPath;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();

                if (method_exists($controller, $action)) {
                    $controller->$action();
                }
                else {
                    echo "Action not found";
                }
            }
            else {
                echo "Controller incorrect class name";
            }
        }
        else {
            echo "Controller not found";
        }
    }
}