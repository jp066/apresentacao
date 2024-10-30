<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Projeto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Cadastrar Novo Projeto</h1>
        
        <form action="../action/cadastrar_projeto.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nome do Projeto</label>
                <input type="text" name="nome" placeholder="Digite o nome do projeto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Descrição</label>
                <textarea name="descricao" placeholder="Digite a descrição do projeto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Data de Início</label>
                <input type="date" name="data_inicio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Data de Fim</label>
                <input type="date" name="data_fim" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-400">
                Cadastrar Projeto
            </button>
        </form>
    </div>
</body>
</html>
