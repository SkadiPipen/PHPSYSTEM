<?php

interface IRoomRepository {
    public function getAllRoom();
    public function getRoomById($id);
    public function createRoom($roomData);
    public function updateRoom($id, $roomData);
    public function deleteRoom($id);


}