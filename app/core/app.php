<?php
  require_once __DIR__."/../controllers/PageController.php";
class App extends PageController
{   
    public function run()
    {
      $PageController= new PageController;  
      $url = $this->splitURL();
      $urlError=$url['params'];
      $url=$url['url'];
      $viename = strtolower($url[0]);
      // Homepage
      if (  $viename === '') {
         $viename = 'home';
      }
        // Subpage
        if (method_exists($PageController , $viename)) {   
          unset($url[0]);

          if (isset($url[1])) {
            if (method_exists($PageController,  $viename)) {
                $viename = strtolower($url[1]);
              unset($url[1]);
            } 
          }
        }
        
        // 404
        else {
            $viename = 'error404';
        }



      $params = array_values($url);
      call_user_func_array([ $PageController,    $viename ], $params); // problem s objektom
    }

    protected function splitURL()
    {
      $url = trim(substr("{$_SERVER['REQUEST_URI']}", 11),"/");
      $url = explode('?', $url);
      if (!isset($url[1])) {
        $url[1]="";
      }
      $urlParams = $url[1];
      $url = $url[0];
      $url = explode('/', trim($url, '/'));
      return ["url"=>$url, "params" => $urlParams];
    }
}