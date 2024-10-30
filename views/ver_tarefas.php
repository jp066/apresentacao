<?php
include('../db/conexao.php');
session_start();

// Verificação de autenticação do usuário
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}

// Verifica se o parâmetro projeto_id existe e é numérico
if (!isset($_GET['projeto_id']) || !is_numeric($_GET['projeto_id'])) {
    echo "ID de projeto inválido.";
    header("Location: dashboard.php");  // Redireciona para o dashboard se o ID for inválido
    exit;
}

// Previne SQL Injection usando prepared statements
$projeto_id = (int)$_GET['projeto_id'];  // Cast para inteiro como uma camada adicional de proteção

// Consulta para selecionar o projeto
$sql_projeto = $conn->prepare("SELECT * FROM projetos WHERE id = ?");
$sql_projeto->bind_param("i", $projeto_id);  // Associa o parâmetro à consulta
$sql_projeto->execute();
$result_projeto = $sql_projeto->get_result();

// Verifica se o projeto foi encontrado
if ($result_projeto->num_rows == 0) {
    echo "Projeto não encontrado.";
    header("Location: dashboard.php");  // Redireciona para o dashboard se o projeto não for encontrado
    exit;
}

// Consulta para selecionar as tarefas do projeto
$sql_tarefas = $conn->prepare("SELECT * FROM tarefas WHERE projeto_id = ?");
$sql_tarefas->bind_param("i", $projeto_id);  // Associa o parâmetro à consulta
$sql_tarefas->execute();
$result_tarefas = $sql_tarefas->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas do Projeto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500
 min-h-screen flex flex-col justify-center items-center">
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg max-w-4xl">
        <?php $projeto = $result_projeto->fetch_assoc(); ?>
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Tarefas do Projeto: <span class="text-blue-600"><?= $projeto['nome'] ?></span></h1>
        </div>
        
        <div class="flex justify-between mb-6">
            <a href="dashboard.php" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">
                Voltar ao Dashboard
            </a>
            <a href="cadastrar_tarefa.php?projeto_id=<?= $projeto['id'] ?>" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">
                Cadastrar Nova Tarefa
            </a>
        </div>
        
        <div class="grid grid-cols-1 gap-6">
            <?php while ($tarefa = $result_tarefas->fetch_assoc()) { ?>
                <div class="bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105">
                    <p class="text-lg font-bold text-white">Tarefa: <?= $tarefa['descricao'] ?></p>
                    <p class="text-white">Status: <?= ucfirst($tarefa['status']) ?></p>
                    <p class="text-white">Início: <?= ucfirst($tarefa['data_inicio']) ?> | Fim: <?= ucfirst($tarefa['data_fim']) ?></p>
                    <div class="mt-4">
                        <a href="../action/deletar_tarefa.php?id=<?= $tarefa['id'] ?>" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">
                            Excluir Tarefa
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>

</html>
