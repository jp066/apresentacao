<?php
include('../db/conexao.php');
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../views/login.html");
    exit;
}

$projeto_id = $_GET['id'];

$sql_tarefas = "DELETE FROM tarefas WHERE projeto_id = $projeto_id";
$conn->query($sql_tarefas);

$sql_projeto = "DELETE FROM projetos WHERE id = $projeto_id";
if ($conn->query($sql_projeto) === TRUE) {
    header("Location: ../views/dashboard.php");
} else {
    echo "Erro ao excluir projeto: " . $conn->error;
}
?>
    