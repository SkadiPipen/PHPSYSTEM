<?php

require_once "repositories/RoomRepository.php";
require_once "repositories/interface/IRoomRepository.php";

class RoomController {
    private IRoomRepository $roomRepository;

    public function __construct() {
        $this->roomRepository = new RoomRepository();
    }

    public function getAllRoom() {
        echo json_encode($this->roomRepository->getAllRoom());
    }

    public function getRoomById($id) {
        echo json_encode($this->roomRepository->getRoomById($id));
    }

    public function createRoom($data) {
        $success = $this->roomRepository->createRoom($data);
        echo json_encode(["success" => $success]);
    }

    public function updateRoom($id, $data) {
        $success = $this->roomRepository->updateRoom($id, $data);
        echo json_encode(["success" => $success]);
    }

    public function deleteRoom($id) {
        $success = $this->roomRepository->deleteRoom($id);
        echo json_encode(["success" => $success]);
    }
}
