<?php
include('../db/conexao.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criptografa a senha usando MD5
    $senha_hashed = md5($senha);
    
    // Consulta SQL para inserir os valores (as aspas foram adicionadas ao redor de $senha_hashed)
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_hashed')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../views/login.html");
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
}
?>
