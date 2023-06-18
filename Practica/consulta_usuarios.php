<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password_db = "root";
$database = "laboratorio";

$conn = new mysqli($servername, $username, $password_db, $database);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Consultar los usuarios registrados
$sql = "SELECT * FROM registros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h2>Usuarios registrados:</h2>";
  echo "<table>";
  echo "<tr><th>ID</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Email</th><th>Login</th><th>Password</th></tr>";
  
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["nombre"]."</td>";
    echo "<td>".$row["apellido1"]."</td>";
    echo "<td>".$row["apellido2"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td>".$row["login"]."</td>";
    echo "<td>".$row["password"]."</td>";
    echo "</tr>";
  }
  
  echo "</table>";
} else {
  echo "No se encontraron usuarios registrados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
<a href="index.html">Volver al formulario</a>
