<?php
session_start();

include 'Contato.class.php';
$contato = new Contato();

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $dados = $contato->checkUser($email);

    if ($dados) {
        echo "<script>alert('Usuário já cadastrado!')</script>";
    } else {
        $contato->insertUser($nome, $email, $senha);
        echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
    }
} elseif (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $dados = $contato->checkUserPass($email, $senha);

    if ($dados) {
        $_SESSION['nome'] = $dados['nome'];
        header("location:index.php");
    } else {
        echo "<script>alert('Email ou senha incorretos!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Página de login com opções para login social, alternância de visibilidade da senha e link para criar uma nova conta.">
  <title>Login</title>

  <!-- links css -->
  <link rel="stylesheet" href="./assets/css/global.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">

  <!-- scripts JavaScript -->
  <script src="./backend/form-validation.js" defer></script>
  <script src="./backend/Global.js" defer></script>
  <script src="./backend/LanguageToggle.js" defer></script>
  <script src="./backend/PasswordToggle.js" defer></script>
  <script>
    acesso();
  </script>  

</head>

<body>

  <!-- Header com Navbar -->
  <header id="navigation-header">
    <nav id="navbar">
      <div id="logo-container">
        <img src="#" alt="" id="logo">
      </div>
      <div id="navigation-buttons">
        <select id="language-selector" aria-label="Selecione o idioma">
          <option value="pt">Português (Brasil)</option>
          <option value="en">English (United States)</option>
          <option value="es">Español</option>
        </select>
        <button class="button-login" data-translate="loginButton">Login</button>
        <button id="button-signup" data-translate="buttonSignup">Cadastrar</button>
      </div>
    </nav>
  </header>

  <!-- Main Container de Login -->
  <main id="login-container">
    <section id="login-box">

      <!-- Formulário de Login -->
      <form id="login-form" method="POST">

        <label for="email" data-translate="emailLabel">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password" data-translate="passwordLabel">Senha</label>
        <div class="password-input-container">
          <input type="password" name="senha" id="password" required>

          <span id="icon-toggle-password">
            <img src="./assets/images/eye-open.png" alt="Toggle password visibility" width="20" id="toggle-icon">
          </span>
        </div>

        <div class="container-options">
          <label class="container-checkbox">
            <input type="checkbox" class="checkbox-terms" required>
            <span data-translate="termsAgreement">Concordo com os</span> <a href="#" data-translate="termsLink">termos de uso</a>
          </label>
          <a href="#" class="link-forgot-password" data-translate="forgotPassword">Esqueceu sua senha?</a>
        </div>

        <button type="submit" name="login" value="Login" id="button-login-submit" data-translate="loginButton">Login</button>

        <!-- Botões do Login Social -->
        <div id="social-login-buttons">
          <button class="button-social-login">
            <img src="./assets/images/google-logo.png" alt="Google Icon" class="icon-social">
            <span class="social-text">Continue com Google</span>
          </button>
          <button class="button-social-login">
            <img src="./assets/images/twitter-logo.png" alt="Twitter Icon" class="icon-social">
            <span class="social-text">Continue com Twitter</span>
          </button>
          <button class="button-social-login">
            <img src="./assets/images/github-logo.png" alt="GitHub Icon" class="icon-social">
            <span class="social-text">Continue com GitHub</span>
          </button>
        </div>
      </form>

      <div id="button-container-signup">
        <button id="button-signup-create-account">
          <a href="cadastrar.php" class="esqueceu" data-translate="createAccountButton">Criar conta</a>
        </button>
      </div>

    </section>
  </main>
</body>

</html>
