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
        $url = $_SERVER(['REQUEST_URI'], PHP_URL_PATH);
        if ($url != '/') {
            $url = rtrim($url, '/');
        }
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                
            }
        }
    }

    /**
     * @param GET|POST $httpMethod
     */
    private function addRoute(string $httpMethod, string $url, string $controller, string $method) {
        $this->routes[$httpMethod][$url] = [$controller, $method];
    }
}