<?php

require_once('../../config/Conexao.php');
require_once('../../model/UsuarioModel.php');

//entrada

$json = file_get_contents("php://input");
$reqbody = json_decode($json);
$id = $reqbody->idUsuario;

//processamento
$conexao = new Conexao();
$db = $conexao->abrirConexao();
$usuarioModel = new UsuarioModel($db);
$usuarioModel->id = $id;
$retorno = $usuarioModel->deletar();

//saida
echo json_encode($retorno);


?>