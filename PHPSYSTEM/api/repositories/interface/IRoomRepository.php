<?php

interface IRoomRepository {
    public function getAllRoom();
    public function getRoomById($id);
    public function createRoom($tenantData);
    public function updateRoom($id, $tenantData);
    public function deleteRoom($id);


}