<?php

require_once "config/Database.php";
require_once "repositories/interface/IAdminRepository.php";

class AdminRepository implements IAdminRepository {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAdmin() {
        $stmt = $this->conn->prepare("SELECT admin_id, admin_email FROM admin");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdminById($id) {
        $stmt = $this->conn->prepare("SELECT admin_id, admin_email FROM admin WHERE admin_id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function createAdmin($adminData) {
        $stmt = $this->conn->prepare("INSERT INTO admin (admin_email, admin_password)
                                      VALUES (:email, :password)");
        return $stmt->execute([
            ':email' => $adminData['admin_email'],
            ':password' => password_hash($adminData['admin_password'], PASSWORD_BCRYPT)
        ]);
    }

    public function updateAdmin($id, $adminData) {
        $stmt = $this->conn->prepare("UPDATE admin SET
            admin_email = :email,
            admin_password = :password
            WHERE admin_id = :id");

        return $stmt->execute([
            ':email' => $adminData['admin_email'],
            ':password' => password_hash($adminData['admin_password'], PASSWORD_BCRYPT),
            ':id' => $id
        ]);
    }

    public function deleteAdmin($id) {
        $stmt = $this->conn->prepare("DELETE FROM admin WHERE admin_id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
