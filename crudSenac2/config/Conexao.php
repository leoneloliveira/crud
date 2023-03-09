<?php

class Conexao {
  public $host = "localhost";
  public $porta = 3306;
  public $nomeBanco = "crudSenac";
  public $usuarioBanco = "root";
  public $senhaUsuario = "";

  public $pdo = null;

  public function abrirConexao() {
    try{
      $this->pdo = new PDO(
        'mysql:host='.$this->host.';dbname='.$this->nomeBanco,
        $this->usuarioBanco, 
        $this->senhaUsuario
      );

      $this->pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
      $this->pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
      );
    }
    catch(PDOException $ex) {
      echo 'Erro ao conectar com o banco de dados: '.$ex->getMessage();
    }
    return $this->pdo;
  }
}