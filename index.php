<?php
include 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Warehouse - Star Inventory</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>✨ Aplikasi Gudang dan Penjualan ✨</h1>
        
        <!-- Form Tambah Barang -->
        <form method="POST" action="">
            <input type="text" name="item_name" placeholder="Nama Barang" required>
            <input type="number" name="quantity" placeholder="Jumlah" required>
            <button type="submit" name="add_item">Tambah Barang</button>
        </form>

        <?php
        // Tambah barang ke database
        if(isset($_POST['add_item'])) {
            $item_name = $_POST['item_name'];
            $quantity = $_POST['quantity'];
            
            $stmt = $pdo->prepare("INSERT INTO items (name, quantity) VALUES (?, ?)");
            $stmt->execute([$item_name, $quantity]);
        }
        ?>

        <!-- Tabel Barang -->
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
            <?php
            $stmt = $pdo->query("SELECT * FROM items");
            while($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['quantity']."</td>";
                echo "<td><button onclick='moveToSales(".$row['id'].")'>Jual</button></td>";
                echo "</tr>";
            }
            ?>
        </table>
        
        <a href="sales.php"><button>Lihat Penjualan 🌟</button></a>
    </div>
    <script src="js/script.js"></script>
</body>
</html>