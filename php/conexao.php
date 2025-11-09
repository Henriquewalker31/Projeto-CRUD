<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livraria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("conexao falhou: " . $conn->connect_error);
}
?>
<!-- atualização para commit -->