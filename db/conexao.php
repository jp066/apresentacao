<?php
$servername = "localhost";
$username = "root";  // Seu usuário do MySQL
$password = "";      // Sua senha do MySQL
$dbname = "gestao_projetos";  // O nome do seu banco de dados

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
