<?php

require_once "repositories/TenantRepository.php";
require_once "repositories/interface/ITenantRepository.php";

class TenantController {
    private ITenantRepository $tenantRepository;

    public function __construct() {
        $this->tenantRepository = new TenantRepository();
    }

    public function getAllTenants() {
        echo json_encode($this->tenantRepository->getAllTenants());
    }

    public function getTenantById($id) {
        echo json_encode($this->tenantRepository->getTenantById($id));
    }

    public function createTenant($data) {
        $success = $this->tenantRepository->createTenant($data);
        echo json_encode(["success" => $success]);
    }

    public function updateTenant($id, $data) {
        $success = $this->tenantRepository->updateTenant($id, $data);
        echo json_encode(["success" => $success]);
    }

    public function deleteTenant($id) {
        $success = $this->tenantRepository->deleteTenant($id);
        echo json_encode(["success" => $success]);
    }
}
