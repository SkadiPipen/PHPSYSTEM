<?php
require_once "config/Database.php";
require_once "repositories/interface/IRoomRepository.php";

class RoomRepository implements IRoomRepository {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAllRoom() {
        $stmt = $this->conn->prepare("SELECT * FROM room");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoomById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM room WHERE room_id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createRoom($roomData) {
        $stmt = $this->conn->prepare("INSERT INTO room (room_number, room_capacity, room_status)
                                      VALUES (:number, :capacity, :status)");
        return $stmt->execute([
            ':number' => $roomData['number'],
            ':capacity' => $roomData['capacity'],
            ':status' => $roomData['status']
        ]);
    }

    public function updateRoom($id, $roomData) {
        $stmt = $this->conn->prepare("UPDATE room SET
            room_number = :number,
            room_capacity = :capacity,
            room_status = :status
            WHERE room_id = :id");

        return $stmt->execute([
            ':number' => $roomData['number'],
            ':capacity' => $roomData['capacity'],
            ':status' => $roomData['status'],
            ':id' => $id
        ]);
    }

    public function deleteRoom($id) {
        $stmt = $this->conn->prepare("DELETE FROM room WHERE room_id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
