<?php
class Penjualan {
    private $conn;
    private $table = "penjualan";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT p.*, c.name AS customer_name
                  FROM {$this->table} p
                  JOIN customers c ON p.customer_id = c.customer_id
                  ORDER BY p.tanggal_penjualan DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create($customer_id, $tanggal) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (customer_id, tanggal_penjualan) VALUES (?, ?)");
        $stmt->execute([$customer_id, $tanggal]);
        return $this->conn->lastInsertId(); // balikin ID transaksi
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE penjualan_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE penjualan_id = ?");
        return $stmt->execute([$id]);
    }
}