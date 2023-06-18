<?php



// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
  $nombre = $_POST["nombre"];
  $apellido1 = $_POST["apellido1"];
  $apellido2 = $_POST["apellido2"];
  $email = $_POST["email"];
  $login = $_POST["login"];
  $password = $_POST["password"];

  $servername = "localhost";
  $username = "root";
  $password_db = "root";
  $database = "laboratorio";

  $conn = new mysqli($servername, $username, $password_db, $database);
 
  // Verificar la conexión
  if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
  }
  $sql_check_email = "SELECT * FROM registros WHERE email = '$email'";
  $result = $conn->query($sql_check_email);
  
  $sql_check_user = "SELECT * FROM registros WHERE login = '$login'";
  $resultuser = $conn->query($sql_check_user);
  
  if ($result->num_rows > 0) {
    echo "El correo electrónico ya está registrado. Por favor, utiliza otro correo electrónico.";
    echo "<a href='index.html'>Volver al formulario</a>";
    exit;
  }
  if ($resultuser->num_rows > 0) {
    echo "El usuario ya esta registrado. Vuelva a intentarlo";
    echo "<a href='index.html'>Volver al formulario</a>";
    exit;
  }

  // Insertar los datos en la base de datos
  $sql_insert = "INSERT INTO registros (nombre, apellido1, apellido2, email, login, password) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";

  if ($conn->query($sql_insert) === TRUE) {
    echo "Registro creado exitosamente.";
    echo "<a href='consulta_usuarios.php'>Consulta</a>";
  } else {
    echo "Error al crear el registro: " . $conn->error;
  }
  $conn->close();
}