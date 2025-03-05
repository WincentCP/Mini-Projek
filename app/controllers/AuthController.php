<?php
class AuthController {
    private $db;
    private $userModel;

    // Konstruktor: inisialisasi database dan model User
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/User.php';
        $this->userModel = new User($this->db);
    }

    // Fungsi untuk login pengguna
    public function login() {
        require_once 'app/helpers/AuthMiddleware.php';
        
        // Check if user is already logged in
        if (isset($_SESSION['user_id'])) {
            header('Location: home');
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            if($this->userModel->login($email, $password)) {
                header('Location: home');
                exit();
            }
        }
        require_once 'app/views/login.php';
    }

    // Fungsi untuk registrasi pengguna baru
    public function register() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isGuest();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $role = $this->isFirstUser() ? 'admin' : 'user';

            if($this->userModel->register($name, $email, $password, $role)) {
                header('Location: login');
                exit();
            }
        }
        require_once 'app/views/register.php';
    }

    // Fungsi untuk memeriksa apakah pengguna pertama
    private function isFirstUser() {
        $query = "SELECT COUNT(*) as count FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return intval($result['count']) === 0; // Changed from string comparison to integer
    }

    // Fungsi untuk logout pengguna
    public function logout() {
        session_destroy();
        header('Location: login');
        exit();
    }
}