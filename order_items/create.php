<?php
// Thông tin kết nối MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Tạo kết nối
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Câu lệnh INSERT INTO
    $sql = "INSERT INTO order_items (id, quantity, price, orders_id, products_id) VALUES (null, :quantity, :price, :orders_id, products_id)";
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    
    // Gán giá trị cho các tham số
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':orders_id', $orders_id);
    $stmt->bindParam(':products_id', $products_id);
    
    // Gán giá trị cho các biến
    $quantity = 'quantity';
    $price = 'price';
    $orders_id = 'orders_id';
    $products_id = 'products_idorders_id';
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    echo "Record created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>