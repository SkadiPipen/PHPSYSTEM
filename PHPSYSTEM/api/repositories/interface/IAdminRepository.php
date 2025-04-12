<?php

interface IAdminRepository {
    public function getAdmin();
    public function getAdminById($id);
    public function createAdmin($tenantData);
    public function updateAdmin($id, $tenantData);
    public function deleteAdmin($id);


}