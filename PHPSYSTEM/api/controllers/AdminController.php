<?php

require_once "repositories/AdminRepository.php";
require_once "repositories/interface/IAdminRepository.php";

class AdminController {
    private IAdminRepository $adminRepository;

    public function __construct() {
        $this->adminRepository = new AdminRepository();
    }

    public function getAdmin() {
        echo json_encode($this->adminRepository->getAdmin());
    }

    public function getAdminById($id) {
        echo json_encode($this->adminRepository->getAdminById($id));
    }

    public function createAdmin($data) {
        $success = $this->adminRepository->createAdmin($data);
        echo json_encode(["success" => $success]);
    }

    public function updateAdmin($id, $data) {
        $success = $this->adminRepository->updateAdmin($id, $data);
        echo json_encode(["success" => $success]);
    }

    public function deleteAdmin($id) {
        $success = $this->adminRepository->deleteAdmin($id);
        echo json_encode(["success" => $success]);
    }
}
