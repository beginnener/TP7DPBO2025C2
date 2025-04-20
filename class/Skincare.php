<?php
class Skincare {
    private $conn;
    private $table = "skincare";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt;
    }

    public function create($name, $brand, $price) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (product_name, brand, price) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $brand, $price]);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE skincare_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $brand, $price) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET product_name = ?, brand = ?, price = ? WHERE skincare_id = ?");
        return $stmt->execute([$name, $brand, $price, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE skincare_id = ?");
        return $stmt->execute([$id]);
    }
}