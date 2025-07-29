<?php

class Router
{
    public function route()
    {
        // Obtener la URL o poner 'tarea/index' por defecto
        $url = isset($_GET['url']) ? $_GET['url'] : 'tarea/index';

        // Dividir la URL en partes
        $parts = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));

        $controllerName = ucfirst($parts[0]) . 'Controller'; // ej: TareaController
        $methodName = isset($parts[1]) ? $parts[1] : 'index';  // ej: index
        $params = array_slice($parts, 2); // otros parámetros en la URL

        $controllerFile = 'app/controllers/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $methodName)) {
                    call_user_func_array([$controller, $methodName], $params);
                    return;
                }
            }
        }

        // Si algo falla, mostrar error
        echo "Error 404 - Página no encontrada.";
    }
}
