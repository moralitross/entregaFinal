<?php
require_once "index.php";

cabecera("Borra Todo", MENU_VOLVER);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ejercicio1Form";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "DROP DATABASE IF EXISTS Ejercicio1Form";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
?>