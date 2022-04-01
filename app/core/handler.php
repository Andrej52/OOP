<?php
class Handler
{
    protected function view($view)
    {
        $viewFileName = __DIR__."/../views/{$view}.php";
        $fallbackViewFileName = __DIR__."/../views/404.php";
        
        if (file_exists($viewFileName)) 
        {
            require $viewFileName;
        }
        else
        {
            include $fallbackViewFileName;
        }
    } 
    
    protected function loadModel($model)
    {
        if (file_exists("../app/models/$model.php")) 
        {
            include "../app/models/$model.php";
            return $model = new $model;
        }

        return false;
    } 
}