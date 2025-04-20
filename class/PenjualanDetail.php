<?php
class PenjualanDetail {
    private $conn;
    private $table = "penjualan_detail";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getByPenjualanId($penjualan_id) {
        $query = "SELECT d.*, s.product_name 
                  FROM {$this->table} d 
                  JOIN skincare s ON d.skincare_id = s.skincare_id 
                  WHERE d.penjualan_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$penjualan_id]);
        return $stmt;
    }

    public function create($penjualan_id, $skincare_id, $jumlah, $harga_saat_itu, $total_harga) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} 
            (penjualan_id, skincare_id, jumlah, harga_saat_itu, total_harga)
            VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$penjualan_id, $skincare_id, $jumlah, $harga_saat_itu, $total_harga]);
    }

    public function deleteByPenjualanId($penjualan_id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE penjualan_id = ?");
        return $stmt->execute([$penjualan_id]);
    }
}