<?php

namespace App\Http;

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $uri, callable $action)
    {
        $this->routes[$method][$uri] = $action;
    }

    public function dispatch(string $method, string $uri)
    {
        if (!isset($this->routes[$method])) {
            echo "Método HTTP não permitido.";
            return;
        }

        list($action, $params) = $this->matchRoute($this->routes[$method], $uri);

        if ($action) {
            call_user_func_array($action, $params);
        } else {
            echo "Rota não encontrada.";
        }
    }

    private function matchRoute($routes, $uri)
    {
        foreach ($routes as $route => $action) {
            $pattern = preg_replace('#\{[^\}]+\}#', '(\d+)', $route);
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                array_shift($matches); // Remove a URI completa do início
                return [$action, $matches]; // Retorna o callback e os parâmetros
            }
        }
        return [null, []];
    }
}
