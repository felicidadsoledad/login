<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM auto WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: auto.php");
        exit;
    } else {
        echo "Error al eliminar: " . $stmt->error;
    }
}
?>