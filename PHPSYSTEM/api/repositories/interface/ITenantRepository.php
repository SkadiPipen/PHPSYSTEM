<?php

interface ITenantRepository {
    public function getAllTenants();
    public function getTenantById($id);
    public function createTenant($tenantData);
    public function updateTenant($id, $tenantData);
    public function deleteTenant($id);

}