<?php

class Contato{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    function getId(){
        return $this->id;
    }
    function getNome(){
        return $this->nome;
    }
    function getEmail(){
        return $this->email;
    }
    function getSenha(){
        return $this->senha;
    }

    function setNome($nome){
        $this->nome = $nome;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }

    function __construct(){
        $dsn    = "mysql:dbname=dailyayu;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);
        
        } catch (\Throwable $problema) {
            echo "<script>
                    alert('Banco indisponivel. Tente mais Tarde!!')
                 </script>";
        } 
    }

   
    function insertUser($nome, $email, $senha){
        
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";

        $sql = $this->pdo->prepare($sql);
        
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha);

        return $sql->execute();
    }

    function checkUserPass($email, $senha){
        $sql = "SELECT *FROM usuarios WHERE email = :e AND senha =:s";
        $sql = $this->pdo->prepare($sql);
        
        $sql-> bindValue(":e", $email);
        $sql-> bindValue(":s", $senha);
        $sql->execute();
        
        if( $sql->rowCount() > 0 ){
            $dados = $sql->fetch();            
        }else{
            $dados = array();
        }
        
        return $dados;
    }

    
    function checkUser($email){
        $sql = "SELECT *FROM usuarios WHERE email = :e";
        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":e", $email);
        $sql->execute();

        if( $sql->rowCount() > 0 ){
            $dados = $sql->fetch();            
        }else{
            $dados = array();
        }

        return $dados;
    }
    
}
