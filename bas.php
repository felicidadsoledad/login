
<?php
// Configuración de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base1";

$conn = new mysqli($servername, $username, $password, $dbname);
//$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];

    $sql = "INSERT INTO auto (modelo, precio, marca) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $modelo, $precio, $marca);

    if ($stmt->execute()) {
        header("Location: auto.php"); // Redirige a la página principal
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
