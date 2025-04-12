<?php
require_once "config/Database.php";
require_once "repositories/interface/ITenantRepository.php";

class TenantRepository implements ITenantRepository {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAllTenants() {
        $stmt = $this->conn->prepare("SELECT * FROM tenant");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTenantById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tenant WHERE tenant_id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createTenant($tenantData) {
        $stmt = $this->conn->prepare("INSERT INTO tenant (tenant_name, tenant_fname, tenant_email, tenant_password, tenant_contact_num, room_id)
                                      VALUES (:name, :fname, :email, :password, :contact, :room_id)");
        return $stmt->execute([
            ':name' => $tenantData['name'],
            ':fname' => $tenantData['fname'],
            ':email' => $tenantData['email'],
            ':password' => $tenantData['password'],
            ':contact' => $tenantData['contact'],
            ':room_id' => $tenantData['room_id']
        ]);
    }

    public function updateTenant($id, $tenantData) {
        $stmt = $this->conn->prepare("UPDATE tenant SET
            tenant_name = :name,
            tenant_fname = :fname,
            tenant_email = :email,
            tenant_password = :password,
            tenant_contact_num = :contact,
            room_id = :room_id
            WHERE tenant_id = :id");

        return $stmt->execute([
            ':name' => $tenantData['name'],
            ':fname' => $tenantData['fname'],
            ':email' => $tenantData['email'],
            ':password' => $tenantData['password'],
            ':contact' => $tenantData['contact'],
            ':room_id' => $tenantData['room_id'],
            ':id' => $id
        ]);
    }

    public function deleteTenant($id) {
        $stmt = $this->conn->prepare("DELETE FROM tenant WHERE tenant_id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
