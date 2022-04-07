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
      $viewname = strtolower($url[0]);
      // Homepage
      if ($viewname === '') {
         $viewname = 'home';
      }
        // Subpage
        if (method_exists($PageController , $viewname)) {   
          unset($url[0]);

          if (isset($url[1])) {
            if (method_exists($PageController, $viewname)) {
              $viewname = strtolower($url[1]);

              unset($url[1]);
            } 
          }
          if ($urlError !="") 
          {
          $urlparams=explode("=",$urlError);
          $_SERVER['type']=$urlparams[0];
          $_SERVER['msg']=$urlparams[1];
          }
        }        
        // 404-
        else {
            $viewname = 'error404';
        }
        
      $params = array_values($url);
      call_user_func_array([ $PageController , $viewname ], $params); // problem s objektom
    }

    protected function splitURL()
    {
      $url = explode("public/",$_SERVER['REQUEST_URI']);
      $url = explode('?', $url[1]);
      if (!isset($url[1]))
      {
        $url[1]="";
      }
      $urlParams = $url[1];
      $url = explode('/', trim($url[0], '/'));
      return ["url"=>$url, "params" => $urlParams];
    }
}