₢   <?php
session_start();

if( isset( $SESSION['nome'])){
    $nome = $_SESSION['nome'];
    echo "Bem vindo a nossa pagina $nome";
}else{
    header("location:loginOld.php");
}

