<?php
class AuthMiddleware {
    // Fungsi untuk memeriksa apakah pengguna sudah login
    public static function isAuthenticated() {
        if (!isset($_SESSION['user_id'])) {
            if (!self::isLoginPage()) {
                header('Location: index.php?url=login');
                exit();
            }
        }
    }

    // Fungsi untuk memeriksa apakah pengguna adalah admin
    public static function isAdmin() {
        self::isAuthenticated();
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?url=home');
            exit();
        }
    }

    // Fungsi untuk memeriksa apakah pengguna adalah guest (belum login)
    public static function isGuest() {
        if (isset($_SESSION['user_id'])) {
            if (!self::isHomePage()) {
                header('Location: index.php?url=home');
                exit();
            }
        }
    }

    private static function isLoginPage() {
        $uri = $_SERVER['REQUEST_URI'];
        return strpos($uri, '/login') !== false || strpos($uri, 'index.php?url=login') !== false;
    }

    private static function isHomePage() {
        $uri = $_SERVER['REQUEST_URI'];
        return $uri === '/' || strpos($uri, '/home') !== false || strpos($uri, 'index.php?url=home') !== false;
    }
}