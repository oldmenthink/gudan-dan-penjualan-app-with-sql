<?php
include 'config/database.php';

header('Content-Type: application/json');

$item_id = $_POST['item_id'];

// Ambil data barang
$stmt = $pdo->prepare("SELECT * FROM items WHERE id = ?");
$stmt->execute([$item_id]);
$item = $stmt->fetch();

// Kurangi stok
$new_quantity = $item['quantity'] - 1;
$pdo->prepare("UPDATE items SET quantity = ? WHERE id = ?")->execute([$new_quantity, $item_id]);

// Tambah ke tabel penjualan
$pdo->prepare("INSERT INTO sales (item_name, quantity) VALUES (?, 1)")
    ->execute([$item['name']]);

// Hapus jika stok habis
if($new_quantity <= 0) {
    $pdo->prepare("DELETE FROM items WHERE id = ?")->execute([$item_id]);
}

echo json_encode(['success' => true]);
?>