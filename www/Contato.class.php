<?php

class Contato {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    function __construct() {
        $dsn = "mysql:dbname=dailyayu;host=127.0.0.1";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);
        } catch (\Throwable $problema) {
            echo "<script>alert('Banco indisponível. Tente mais tarde!')</script>";
        }
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function insertUser($nome, $email, $senha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senhaHash);

        return $stmt->execute();
    }

    function checkUserPass($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $dados = $stmt->fetch();
            if (password_verify($senha, $dados['senha'])) {
                return $dados;
            }
        }
        return false;
    }

    function checkUser($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        return ($stmt->rowCount() > 0) ? $stmt->fetch() : false;
    }
}
?>