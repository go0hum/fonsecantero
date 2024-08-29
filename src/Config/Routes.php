<?php
if (!isset($_SESSION)) {
    session_start();
}

class Routes 
{
    public function Template()
    {
        global $user;
        $user = [];
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['id'] > 0) {
                $user = $_SESSION['user'];
            }
        } 

        $page = $this->getRoute();
        if ($page === 'close') {
            session_destroy();
            header('location: /login');
        }

        include 'View/layout.php';
    }

    public function Content()
    {
        global $user;
        $page = $this->getRoute();

        if ($page !== 'login' && $this->fileExist('./View/module/'.$page.'.php')) {
            include './View/module/'.$page.'.php';
        } else {
            include './View/module/login.php';
        }
    }

    public function fileExist($routeFile)
    {
        if (file_exists($routeFile)) {
            return true;
        } 
        return false;
    }

    public function showOrHideMenu() {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['id'] > 0) {
                return true;
            }
        } 
        return false;
    }

    public function getRoute()
    {
        $route = explode('/', $_SERVER['REQUEST_URI']);
        return $route[1] ?? 'login';
    }

    public function validateSession()
    {
        global $user;
        $user = [];
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['id'] > 0) {
                $user = $_SESSION['user'];
            }
        } 
    }
}