<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de Teste - Área restrita para usuários logados">
    <title>Página de Teste</title>

    <!-- links css -->
    <link rel="stylesheet" href="./assets/css/global.css">

    <!-- scripts JavaScript -->
    <script src="./backend/Global.js" defer></script>
    <script src="./backend/LanguageToggle.js" defer></script>
</head>

<body>

    <main id="test-container">
            <a href="logout.php" class="logout-link">Sair</a>
    </main>

</body>

</html>