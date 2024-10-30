<?php
include('../db/conexao.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $usuario_id = $_SESSION['usuario_id'];
    
    $sql = "INSERT INTO projetos (nome, descricao, data_inicio, data_fim, usuario_id) 
            VALUES ('$nome', '$descricao', '$data_inicio', '$data_fim', $usuario_id)";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../views/dashboard.php");
    } else {
        echo "Erro ao cadastrar projeto: " . $conn->error;
    }
}
?>
