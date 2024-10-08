<?php

namespace Core;

class Router {

    protected $routes = []; // This is not accessible outside of the class

    public function add($uri, $controller, $method) {

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

    }
    public function get($uri, $controller) {

        $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller) {
        
        $this->add($uri, $controller, 'POST');

    }

    public function delete($uri, $controller) {
        
        $this->add($uri, $controller, 'DELETE');

    }

    public function patch($uri, $controller) {
        
        $this->add($uri, $controller, 'PATCH');
        
    }

    public function put($uri, $controller) {
        
        $this->add($uri, $controller, 'PUT');
        
    }

    public function route($uri, $method){
        


        foreach ($this->routes as $route) {
            
            // Check if the route uri and method are the same as the current uri and method
            if($route['uri'] == $uri && $route['method'] == $method) {
                // If they are the same, then require the controller
                require base_path($route['controller']);
                return;
            }
            
        }
        

        // abort();
        $this->abort();
    }

    protected function abort($code = 404) { // By default, the code is 404: Page Not Found
    
        http_response_code($code);
        require base_path("views/{$code}.php");
        
        die(); // kill the execution
    }
    
}