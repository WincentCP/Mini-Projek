<?php
class SavingController {
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

    // Fungsi untuk menampilkan halaman simpan tabungan dan memproses penyimpanan
    public function index() {
        require_once __DIR__ . '/../helpers/AuthMiddleware.php';
        AuthMiddleware::isAuthenticated();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];
            $message = $_POST['message'];
            $user_id = $_SESSION['user_id'];
            
            if($this->savingModel->create($user_id, $amount, $message)) {
                header('Location: index.php?url=home');
                exit();
            }
        }
        
        require_once __DIR__ . '/../views/save.php';
    }
}