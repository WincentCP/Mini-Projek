<?php
session_start();
require_once 'config/database.php';
require_once 'routes/web.php';

// Mendapatkan parameter URL
$url = isset($_GET['url']) ? $_GET['url'] : 'home';
$router = new Router();
$router->route($url);

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tabungan_db");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan halaman saat ini
$page = $_GET['page'] ?? 'home';

// Memeriksa status login
if (!isset($_SESSION['user_id']) && $page != 'login' && $page != 'register') {
    header("Location: index.php?page=login");
    exit;
}

include 'header.php';

// Routing halaman
switch ($page) {
    case 'login':
        include 'login.php';
        break;
    case 'register':
        include 'register.php';
        break;
    case 'logout':
        session_destroy();      // Menghapus sesi
        header("Location: index.php?page=login");
        exit;
    case 'save':
        include 'save.php';
        break;
    case 'admin':
        // Memeriksa akses admin
        if ($_SESSION['user_role'] !== 'admin') {
            header("Location: index.php");
            exit;
        }
        include 'admin.php';
        break;
    default:
        include 'home.php';
        break;
}

include 'footer.php';

mysqli_close($conn);
?>