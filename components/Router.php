<?php

class Router
{


    private $routes;


    public function __construct()
    {
        // Path to file with routing
        $routesPath = ROOT . '/config/routes.php';

        // Get the routes from the file
        $this->routes = include($routesPath);
    }

    /**
     * Returns the query string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Method for request processing
     */
    public function run()
    {
        // Get the query string
        $uri = $this->getURI();

        // Check the presence of such a request in the route array (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

            // Compare $ uriPattern and $ uri
            if (preg_match("~$uriPattern~", $uri)) {


                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;

                $controllerFile = ROOT . '/controllers/' .
                        $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);


                if ($result != null) {
                    break;
                }
            }
        }
    }

}
