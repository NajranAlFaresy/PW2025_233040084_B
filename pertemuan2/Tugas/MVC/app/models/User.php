<?php
/**
 * Model User
 * Menangani semua operasi database yang berkaitan dengan tabel users
 */
class User {
    // Property untuk menyimpan koneksi database
    private $pdo;

    /**
     * Constructor
     * @param PDO $pdo - Objek koneksi database
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Mengambil semua data pengguna dari database
     * @return array
     */
    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mengambil data pengguna berdasarkan ID
     * @param int $id
     * @return array|false
     */
    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Menambahkan pengguna baru ke database
     * @param string $nama
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function createUser($nama, $email, $password)
{
    try {
        $sql = "INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Gagal menambah data: " . $e->getMessage();
        return false;
    }
}

    /**
     * Memperbarui data pengguna berdasarkan ID
     * @param int $id
     * @param string $nama
     * @param string $email
     * @param string|null $password
     * @return bool
     */
    public function updateUser($id, $nama, $email, $password, $isHashed = false)
{
    try {
        // Kalau belum di-hash, hash dulu
        if (!$isHashed) {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }

        $sql = "UPDATE users 
                SET nama = :nama, email = :email, password = :password 
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Gagal update: " . $e->getMessage();
        return false;
    }
}

    /**
     * Menghapus pengguna berdasarkan ID
     * @param int $id
     * @return bool
     */
    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Mengecek apakah email sudah ada di database
     * @param string $email
     * @return bool
     */
    private function isEmailExists($email) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
