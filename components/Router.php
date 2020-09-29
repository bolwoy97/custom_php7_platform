<?php

class Router
{

    private static $routes;
    private static $routesPath = ROOT . '/config/routes.php';
    
   /* public function __construct()
    {
        
        
    }*/

    /**
     * Returns request string
     */
    private static function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public static function run()
    {
        self::$routes = include(self::$routesPath);
        // Получить строку запроса
        $uri = self::getURI();

        // Проверить наличие такого запроса в routes.php
        foreach (self::$routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            $uriPattern .= '(\?*)(\S*)';
            if (preg_match("~^$uriPattern~", $uri)) {
                //echo $uriPattern;exit;
                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                  // echo $internalRoute;             
                // Определить контроллер, action, параметры

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));
                             
                $parameters = $segments;
                
                // Подключить файл класса-контроллера
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
