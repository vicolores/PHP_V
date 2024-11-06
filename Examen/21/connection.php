<?php
// connection.php
function connectDatabase() {
    $servername = "127.0.0.1"; // O la IP del container si fuera distinta
    $username = "mariadb";
    $password = "mariadb";
    $dbname = "mariadb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}
?>

