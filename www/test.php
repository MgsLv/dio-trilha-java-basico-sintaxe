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
    <link rel="stylesheet" href="./assets/css/test.css">
    <link rel="stylesheet" href="./assets/css/navbar.css">
</head>

<body>
    <header id="navigation-header">
        <nav id="navbar">
            <div id="logo-container">
                <img src="#" alt="Logo" id="logo">
            </div>
            <div id="navigation-buttons">
                <select id="language-selector" aria-label="Selecione o idioma">
                    <option value="pt">Português (Brasil)</option>
                    <option value="en">English (United States)</option>
                    <option value="es">Español</option>
                </select>
                <button class="button-login">Login</button>
                <button id="button-signup">Cadastrar</button>
            </div>
        </nav>
    </header>

    <main id="test-container">
        <section id="test-box">
            <h1>Bem-vindo à Página de Teste!</h1>
            <p>Olá, <?php echo $_SESSION['nome']; ?>. Você está logado com o e-mail: <?php echo $_SESSION['email']; ?>.</p>
            <a href="logout.php" class="logout-link">Sair</a>
        </section>
    </main>

</body>

</html>