<?php
class HomeController {
    private $db;
    private $savingModel;

    // Konstruktor: inisialisasi database dan model Saving
    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new Database();
        $this->db = $database->connect();
        require_once __DIR__ . '/../models/Saving.php';
        $this->savingModel = new Saving($this->db);
    }

    // Fungsi untuk menampilkan halaman utama (Home)
    public function index() {
        require_once __DIR__ . '/../helpers/AuthMiddleware.php';
        AuthMiddleware::isAuthenticated();
        
        $savings = $this->savingModel->getAll();
        $userSavings = $this->savingModel->getByUserId($_SESSION['user_id']);
        $totalSavings = $this->savingModel->getTotalByUserId($_SESSION['user_id']);
        $isAdmin = $_SESSION['user_role'] === 'admin';
        
        require_once __DIR__ . '/../views/home.php';
    }

    // Fungsi untuk menampilkan halaman admin
    public function admin() {
        require_once __DIR__ . '/../helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin();
        
        require_once __DIR__ . '/../models/User.php';
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers();
        $savings = $this->savingModel->getAll();
        $totalSavings = $this->savingModel->getTotal();
        
        require_once __DIR__ . '/../views/admin.php';
    }
}