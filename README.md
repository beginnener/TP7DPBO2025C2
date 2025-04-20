_Saya Natasha Adinda Cantika dengan NIM 2312120 mengerjakan TP7 dalam mata kuliah DPBO. Untuk keberkahan-Nya, saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin._


# Program Pendataan Penjualan dan Pembelian Toko Skincare

Program ini merupakan aplikasi berbasis PHP untuk mencatat dan mengelola transaksi penjualan dan pembelian pada sebuah toko skincare.

---

## Struktur Folder

```
/tp 7/
│
├── class/
│   ├── customer.php
│   ├── skincare.php
│   ├── penjualan.php
│   └── penjualan_detail.php
│
├── config/
│   └── db.php
│
├── database/
│   └── penjualan_db.sql
│
├── view/
│   ├── footer.php
│   ├── header.php
│   └── invoice_detail.php
│
└── index.php
```

---

## Fitur Program

### 1. Manajemen Pelanggan (Customers)
- Tambah, edit, dan hapus data pelanggan
- Menyimpan data: nama, email, dan nomor telepon

### 2. Manajemen Produk Skincare
- CRUD produk skincare
- Data meliputi: nama produk, brand, dan harga

### 3. Transaksi Penjualan
- Input transaksi dengan pilihan customer dan banyak produk
- Setiap transaksi mencatat lebih dari satu produk skincare

### 4. Detail Transaksi
- Menyimpan rincian produk yang dibeli dalam setiap transaksi
- Menyimpan jumlah, harga saat itu, dan total harga

### 5. Pencarian (Searching)
- Cari transaksi berdasarkan nama pelanggan
- Memudahkan pelacakan transaksi tertentu

---

## Desain Database

### Tabel `customers`

```sql
CREATE TABLE customers (
  customer_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20)
);
```

### Tabel `skincare`

```sql
CREATE TABLE skincare (
  skincare_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(100),
  brand VARCHAR(100),
  price DECIMAL(10,2)
);
```

### Tabel `penjualan`

```sql
CREATE TABLE penjualan (
  penjualan_id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT,
  tanggal_penjualan DATE,
  FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);
```

### Tabel `penjualan_detail`

```sql
CREATE TABLE penjualan_detail (
  detail_id INT AUTO_INCREMENT PRIMARY KEY,
  penjualan_id INT,
  skincare_id INT,
  jumlah INT,
  harga_saat_itu DECIMAL(10,2),
  total_harga DECIMAL(10,2),
  FOREIGN KEY (penjualan_id) REFERENCES penjualan(penjualan_id),
  FOREIGN KEY (skincare_id) REFERENCES skincare(skincare_id)
);
```

---

## Data Dummy

### Tabel `customers`

```sql
INSERT INTO customers (name, email, phone) VALUES
('Alya Putri', 'alya@gmail.com', '081234567890'),
('Dio Pratama', 'dio.pratama@yahoo.com', '082198765432'),
('Nadya Rizky', 'nadya.rizky@mail.com', '089876543210');
```

### Tabel `skincare`

```sql
INSERT INTO skincare (product_name, brand, price) VALUES
('Brightening Serum', 'GlowSkin', 120000.00),
('Hydrating Toner', 'AquaCare', 95000.00),
('Sunscreen SPF 50', 'SunShield', 110000.00);
```

### Tabel `penjualan`

```sql
INSERT INTO penjualan (customer_id, tanggal_penjualan) VALUES
(1, '2025-04-15'),
(2, '2025-04-17'),
(3, '2025-04-18');
```

### Tabel `penjualan_detail`

```sql
-- Alya beli 2 serum dan 1 toner (penjualan_id = 1)
INSERT INTO penjualan_detail (penjualan_id, skincare_id, jumlah, harga_saat_itu, total_harga) VALUES
(1, 1, 2, 120000.00, 240000.00),
(1, 2, 1, 95000.00, 95000.00),

-- Dio beli 1 sunscreen (penjualan_id = 2)
(2, 3, 1, 110000.00, 110000.00),

-- Nadya beli 3 toner (penjualan_id = 3)
(3, 2, 3, 95000.00, 285000.00);
```

---

## Screenshot

> *(Tambahkan screenshot program di sini, jika tersedia)*

---

> **Catatan:**  
> Pastikan file `penjualan_db.sql` berisi semua definisi dan dummy data di atas agar database dapat di-setup dengan cepat saat awal penggunaan.
