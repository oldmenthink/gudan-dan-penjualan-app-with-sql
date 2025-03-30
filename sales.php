<?php
include 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sales - Star Market</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>🌟 Market Sales 🌟</h1>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jumlah Terjual</th>
                <th>Tanggal</th>
            </tr>
            <?php
            $stmt = $pdo->query("SELECT * FROM sales");
            while($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['item_name']."</td>";
                echo "<td>".$row['quantity']."</td>";
                echo "<td>".$row['sale_date']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
        
        <a href="index.php"><button>Kembali ke Gudang ✨</button></a>
    </div>
</body>
</html>