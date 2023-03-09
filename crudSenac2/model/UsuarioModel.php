<?php

class UsuarioModel {

    public $db = null; //conexao com banco
    public $id = 0;
    public $nomeCompleto = null;
    public $dataNascimento = null;
    public $email = null;
    public $senha = null;
    public $telefone = null;

    public function __construct($conexaoBanco) {
        $this->db = $conexaoBanco;
    }

    public function listarPeloID(){
        $retorno = ['status' => 0, 'dados' => null];
        try{
            $stmt = $this->db->prepare('
            SELECT *FROM usuarios WHERE id = :id
            ');
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            $dados = $stmt->fetchAll();
            $retorno['status']= 1;
            $retorno['dados'] = $dados;

        }
        catch(PDOException $e){
            echo 'Erro ao listar usuario pelo ID:'.$e->getMessage();
        }
        return $retorno;
    }

    public function deletar(){
        $retorno = ['status'=> 0, 'dados' => null];
        try{
            $stmt = $this->db->prepare("
            DELETE FROM usuarios WHERE id = :id            
            ");
            $stmt->bindValue(':id',$this->id);
            $stmt->execute();
            $retorno['status'] = 1;
        }
        catch(PDOException $e){
            echo 'Erro ao deletar usuário:'.$e->getMessage();
        }
        return $retorno;
    }

   public function cadastrar(){
       $retorno =['status' => 0, 'dados' => null];
       try{
           $stmt = $this->db->prepare("
           INSERT INTO usuarios
           (nome_completo, data_nasc, email, senha, telefone)
           values
           (:nome, :data, :email, :senha, :fone)
           ");

           $stmt->bindValue(':nome',$this->nomeCompleto);
           $stmt->bindValue(':data',$this->dataNascimento);
           $stmt->bindValue(':email',$this->email);
           $stmt->bindValue(':senha',$this->senha);
           $stmt->bindValue(':fone',$this->telefone);
           $stmt->$stmt->executa();
           $retorno['status'] = 1;
       }
       catch(PDOException $e){
           echo 'Erro ao cadastrar usuario: '.$e->getMessage();
       }
       return $retorno;
   }


    public function lertodos() {
        $retorno = ['status' => 0, 'dados'=> null];  
      try {  
          $query = $this->db->query('SELECT * FROM usuarios'); 
          $dados = $query->fetchAll();
          $retorno['status']= 1;
          $retorno['dados'] = $dados;            

      }
      catch(PDOException $e){
          echo 'Erro ao lista todos os usuarios: '.$e->getMessage();
      }
      return $retorno;
    }

    public function logar() {
        $retorno = [
            'status' => 0,
            'dados' => null
        ];
        try {
            $stmt = $this->db->prepare('
            SELECT id, email FROM usuarios
            WHERE email = :email
            AND senha = :senha
            LIMIT 1
            ');
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':senha', $this->senha);
            $stmt->execute();
            $dado = $stmt->fetch();

            if ($dado['id'] && $dado['id'] > 0) {
                $retorno['status'] = 1;
                $retorno['dados'] = $dado;
                session_start();
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dado['id'];
                $_SESSION['usuario'] = $dado['email'];
            }
        }
        catch(PDOException $ex) {
            echo 'Erro ao logar: '.$ex->getMessage();
        }
        return $retorno;
    }
          

    

}