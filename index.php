<?php


$tamAgendaNombre    = 40;                   
$tamAgendaApellidos = 60;


define("FORM_METHOD", 'GET');    
define("MENU_PRINCIPAL", "menuPrincipal");  
define("MENU_VOLVER", "menuVolver");   

cabecera("Inicio", MENU_PRINCIPAL);

//La cabecera unicamente muestra los botones principales, (que modificamos esteticamente mediante CSS)
//y los enlaces al resto de archivos
function cabecera($texto, $menu)
{
    print "<!DOCTYPE html>\n";
    print "<html lang=\"es\">\n";
    print "<head>\n";
    print "  <meta charset=\"utf-8\">\n";
    print "  <title>\n";
    print "    $texto. Bases de datos.\n";
    print "  </title>\n";
    print "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
    print "  <link rel=\"stylesheet\" href=\"index.css\" title=\"Color\">\n";
    print "</head>\n";
    print "\n";
    print "<body>\n";
    print "  <header>\n";
    print "    <h1>Bases de datos</h1>\n";
    print "\n";
    print "    <nav>\n";
    print "      <ul>\n";
    if ($menu == MENU_PRINCIPAL) {
        print "        <li><a href=\"insertarForm.php\">Añadir registro</a></li>\n";
        print "        <li><a href=\"selectForm.php\">Listar</a></li>\n";
        print "        <li><a href=\"deleteForm.php\">Borrar</a></li>\n";
        print "        <li><a href=\"buscarForm.php\">Buscar</a></li>\n";
        print "        <li><a href=\"modificarForm.php\">Modificar</a></li>\n";
        print "        <li><a href=\"borrarTodoForm.php\">Borrar todo</a></li>\n";
    } elseif ($menu == MENU_VOLVER) {
        print "        <li><a href=\"index.php\">Volver</a></li>\n";
    } else {
        print "        <li>Error en la selección de menú</li>\n";
    }
    print "      </ul>\n";
    print "    </nav>\n";
    print "  </header>\n";
    print "\n";
    print "  <main>\n";
}

//Asi creariamos una nueva BBDD, aunque veo mas funcional crearla directamente desde MySQL
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE Ejercicio1Form";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

//Asi creariamos una nueva tabla dentro de la BBDD seleccionada
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
// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();

?>