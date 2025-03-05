<?php
class Router {
    public function route($url) {
        $url = parse_url($url, PHP_URL_PATH);
        $url = trim($url, '/');

        switch($url) {
            case 'login':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->login();
                break;
            case 'register':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->register();
                break;
            case 'logout':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->logout();
                break;
            case 'save':
                require_once 'app/controllers/SavingController.php';
                $controller = new SavingController();
                $controller->index();
                break;
            case 'admin':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->admin();
                break;
            case '':
            case 'home':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->index();
                break;
            default:
                // Handle 404
                header("HTTP/1.0 404 Not Found");
                echo "404 Not Found";
                break;
        }
    }
}