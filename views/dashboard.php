<?php
include('../db/conexao.php');
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$sql_projetos = "SELECT * FROM projetos WHERE usuario_id = $usuario_id";
$result_projetos = $conn->query($sql_projetos);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-5xl w-full">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Meus Projetos</h1>
            <div>
                <a href="cadastrar_projeto.php" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                    Cadastrar Novo Projeto
                </a>
                <a href="../action/logout.php" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-4 transition duration-300 ease-in-out">
                    Sair
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php while ($projeto = $result_projetos->fetch_assoc()) { ?>
                <div class="bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105">
                    <h2 class="text-xl font-bold text-white"><?= $projeto['nome'] ?></h2>
                    <p class="text-white mt-2"><?= $projeto['descricao'] ?></p>
                    <p class="text-white mt-2">Início: <?= $projeto['data_inicio'] ?> | Fim: <?= $projeto['data_fim'] ?></p>
                    <div class="mt-4 flex justify-between">
                        <a href="ver_tarefas.php?projeto_id=<?= $projeto['id'] ?>" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                            Ver Tarefas
                        </a>
                        <a href="../action/deletar_projeto.php?id=<?= $projeto['id'] ?>" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                            Excluir
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
