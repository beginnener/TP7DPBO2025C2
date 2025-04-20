<?php
class Customer {
    private $conn;
    private $table = "customers";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt;
    }

    public function create($name, $email, $phone) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, phone) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $phone]);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE customer_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $email, $phone) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, email = ?, phone = ? WHERE customer_id = ?");
        return $stmt->execute([$name, $email, $phone, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE customer_id = ?");
        return $stmt->execute([$id]);
    }
}