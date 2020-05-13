<?php

// класс обработки ЧПУ запросов


class URLRouter {
    private $_route = array();

    public function setRoute($dir,$file)
    {
        $this->_route[trim($dir,'/')] = $file;

    }

    public function Route()
    {
        if(!isset($_SERVER['PATH_INFO'])) {
            include_once "index.php";
        }elseif (isset($this->_route[trim($_SERVER["PATH_INFO"],"/")])) {
            include_once $this->_route[trim($_SERVER['PATH_INFO'],"/")];
        }
        else return false;

        return true;
    }
}

$route = new URLRouter;

$route->setRoute("page/article-1/","catalog.php");

$route->setRoute("article-2","login.php");
if($route->Route())
{
    echo 'Маршрут не найден';
}

?>