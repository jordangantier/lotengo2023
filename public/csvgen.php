<?php
//Selección de base de datos.
$servername = "localhost";
$database = "lotengo2023";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT serie, md5hash, numeros FROM boletos";
$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_array()) {
    echo $row['serie'] . json_encode($row['numeros']) . '<br>';
}
