<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Exclusão</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Confirmar Exclusão</h1>

            <p class="text-gray-600 mb-4">
                Tem certeza de que deseja excluir a quadra <strong><?= htmlspecialchars($quadra->getNome()); ?></strong>?
                Esta ação não poderá ser desfeita.
            </p>

            <form action="/remover-quadras/<?= $quadra->getId(); ?>" method="POST">
                <div class="flex justify-between">
                    <a href="/minhas-quadras" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                        Confirmar Exclusão
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
