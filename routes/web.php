<?php
class Router {
    public function route($url) {
        // Clean up URL
        $url = $url ?? '';
        $url = trim($url, '/');
        
        // For debugging
        // echo "Routing URL: " . $url . "<br>";
        
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
                // Handle 404 with more information
                header("HTTP/1.0 404 Not Found");
                echo "<h1>404 Not Found</h1>";
                echo "<p>The requested URL /{$url} was not found on this server.</p>";
                break;
        }
    }
}