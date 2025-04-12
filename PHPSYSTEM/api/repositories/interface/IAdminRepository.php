<?php

interface IAdminRepository {
    public function getAdmin();
    public function getAdminById($id);
    public function createAdmin($adminData);
    public function updateAdmin($id, $adminData);
    public function deleteAdmin($id);


}