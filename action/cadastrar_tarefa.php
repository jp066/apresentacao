<?php
include('../db/conexao.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $projeto_id = $_POST['projeto_id'];
    
    $sql = "INSERT INTO tarefas (descricao, status, data_inicio, data_fim, projeto_id) VALUES ('$descricao', '$status','$data_inicio', '$data_fim', $projeto_id)";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../views/ver_tarefas.php?projeto_id=$projeto_id");
    } else {
        echo "Erro ao cadastrar tarefa: " . $conn->error;
    }
}
?>
