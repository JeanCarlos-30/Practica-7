<?php
$servername = "db"; 
$username = "root";
$password = "example";
$database = "testdb";

// Conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "<h1>Hola Mundo desde PHP conectado a MySQL!</h1>";

// Crear tabla de ejemplo
$sql = "CREATE TABLE IF NOT EXISTS mensajes (id INT AUTO_INCREMENT PRIMARY KEY, texto VARCHAR(255))";
$conn->query($sql);

// Insertar un mensaje
$conn->query("INSERT INTO mensajes (texto) VALUES ('Hola desde la BD')");

// Mostrar mensajes
$result = $conn->query("SELECT * FROM mensajes");
while($row = $result->fetch_assoc()) {
    echo "<p>" . $row["texto"] . "</p>";
}

$conn->close();
?>
