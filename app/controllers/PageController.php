<?php
// ┬ęcopyright Andrej-52
require_once  __DIR__."/../core/handler.php";
class PageController  extends Handler
{

    function home()
    {
        $this->view("home");
    }

    function show()
    {
        $this->view("show");
    }
    function error404()
    {
        $this->view("404");
    }

    function register()
    {
        $this->view("register");
    }
    function manage()
    {
        $this->view("manage");
    }    
    function login()
    {
        $this->view("login");
    }

    function select()
    {
        $this->view("select");
    }
    
    function add()
    {
        $this->view("add");
    }
    
    function add2()
    {
        $this->view("add2");
    }
        
}
