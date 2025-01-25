<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];

    $sql = "UPDATE auto SET modelo = ?, precio = ?, marca = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdsi", $modelo, $precio, $marca, $id);

    if ($stmt->execute()) {
        header("Location: auto.php");
        exit;
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
}
?>