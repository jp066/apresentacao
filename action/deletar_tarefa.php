<?php
include('../db/conexao.php');
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../views/login.html");
    exit;
}

$tarefa_id = $_GET['id'];
$sql_tarefa = "DELETE FROM tarefas WHERE id = $tarefa_id";

if ($conn->query($sql_tarefa) === TRUE) {
    header("Location: ../views/ver_tarefas.php?projeto_id=" . $_GET['projeto_id']);
} else {
    echo "Erro ao excluir tarefa: " . $conn->error;
}
?>
