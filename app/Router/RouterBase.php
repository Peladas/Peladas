<?php

namespace App\Router;

class RouterBase {
    public $routes = [];

    public function get(string $url, string $controller, string $method) {
        $this->addRoute('GET', $url, $controller, $method);
    }

    public function post(string $url, string $controller, string $method) {
        $this->addRoute('POST', $url, $controller, $method);
    }

    public function matchRoute() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($url != '/') {
            $url = rtrim($url, '/');
        }
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    // Pass the captured parameter values as named arguments to the target function
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); // Only keep named subpattern matches
                    $this->invokeController($target, $params);
                    return;
                }
            }
        }
    }

    /**
     * @param 'GET'|'POST' $httpMethod
     */
    private function addRoute(string $httpMethod, string $url, string $controller, string $method) {
        $this->routes[$httpMethod][$url] = [$controller, $method];
    }

    private function invokeController(array $classMethodString, $params = []) {
        list($controller, $method) = $classMethodString;

        if (!class_exists($controller)) {
            throw new \Exception("A classe $controller não existe");
        }

        if (!method_exists($controller, $method)) {
            throw new \Exception("O método $method não existe na classe $controller");
        }

        $classInstance = new $controller();
        call_user_func_array([$classInstance, $method], $params);
    }
}
