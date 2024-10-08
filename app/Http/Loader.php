<?php

namespace App\Http;

use Exception;

class Loader
{
    public function load(string $controller, string $action, array $params = [])
    {
        try {
            $controllerNamespace = "App\\Controller\\{$controller}";

            if (!class_exists($controllerNamespace)) {
                throw new Exception("O controller {$controller} não existe");
            }

            $controllerInstance = new $controllerNamespace();

            if (!method_exists($controllerInstance, $action)) {
                throw new Exception("O método {$action} não existe no controller {$controller}");
            }

            $controllerInstance->$action($params);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
