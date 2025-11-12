<?php
/**
 * Controller: UserController
 * 
 * Mengatur logika tampilan daftar user, detail user, serta operasi CRUD
 * dalam pola arsitektur MVC.
 */
class UserController {
    private $userModel;

    // Constructor: menerima koneksi database (PDO) dan buat model User
    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    // Router utama
    public function index() {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'create':
                    $this->create();
                    break;
                case 'edit':
                    $this->update($_GET['id'] ?? null);
                    break;
                case 'delete':
                    $this->delete($_GET['id'] ?? null);
                    break;
                default:
                    $this->list();
            }
        } elseif (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->detail($_GET['id']);
        } else {
            $this->list();
        }
    }

    // ===============================
    // 💡 LIST - Tampilkan semua user
    // ===============================
    private function list() {
        $users = $this->userModel->getAllUsers();
        require_once __DIR__ . '/../views/list.php';
    }

    // =================================
    // 💡 DETAIL - Tampilkan satu user
    // =================================
    private function detail($id) {
        if (!$id || !is_numeric($id)) {
            header("Location: index.php");
            exit;
        }

        $user = $this->userModel->getUserById($id);
        if (!$user) {
            echo "<p>User tidak ditemukan.</p>";
            echo '<a href="index.php">Kembali</a>';
            exit;
        }

        require_once __DIR__ . '/../views/detail.php';
    }

    // =================================
    // 💡 CREATE - Tambah user baru
    // =================================
    private function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = trim($_POST['nama'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($nama && $email && $password) {
            if ($this->userModel->createUser($nama, $email, $password)) {
                // redirect ke halaman utama setelah berhasil tambah
                header("Location: index.php?status=created");
                exit; // wajib, agar tidak lanjut render halaman ini
            } else {
                echo "<p style='color:red'>Gagal menambah data ke database!</p>";
            }
        } else {
            echo "<p style='color:red'>Semua field harus diisi!</p>";
        }
    } else {
        require_once __DIR__ . '/../views/create.php';
    }
}

    // =================================
    // 💡 UPDATE - Edit data user
    // =================================
    private function update($id)
{
    if (!$id || !is_numeric($id)) {
        header("Location: index.php");
        exit;
    }

    $user = $this->userModel->getUserById($id);
    if (!$user) {
        echo "<p>Data pengguna tidak ditemukan.</p><a href='index.php'>Kembali</a>";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = trim($_POST['nama'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($nama === '' || $email === '') {
            $error = "Nama dan email tidak boleh kosong!";
        } else {
            // jika password kosong, pakai yang lama
            if ($password === '') {
                $password = $user['password'];
                $isHashed = true; // karena dari database sudah hashed
            } else {
                $isHashed = false; // perlu hash baru
            }

            $ok = $this->userModel->updateUser($id, $nama, $email, $password, $isHashed);
            if ($ok) {
                header("Location: index.php?status=updated");
                exit;
            } else {
                echo "<p style='color:red'>Gagal memperbarui data.</p>";
            }
        }
    }

    require_once __DIR__ . '/../views/edit.php';
}

    // =================================
    // 💡 DELETE - Hapus user
    // =================================
    private function delete($id) {
        if (!$id || !is_numeric($id)) {
            header("Location: index.php");
            exit;
        }

        $this->userModel->deleteUser($id);
        header("Location: index.php?status=deleted");
        exit;
    }
}