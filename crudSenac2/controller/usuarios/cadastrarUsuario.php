<?php

require_once('../../config/Conexao.php');
require_once('../../model/UsuarioModel.php');
// entrada
$json = file_get_contents('php://input');
$reqbody = json_decode($json);
$nomeCompleto = $reqbody->nomeCompleto;
$dataNasc = $reqbody->dataNascimento;
$email = $reqbody->email;
$senha = $reqbody->senha;
$fone = $reqbody->telefone;
//processamento
$conexao = new Conexao();
$db = $conexao->abrirConexao();
$usuarioModel = new UsuarioModel($db);
$usuarioModel->nomeCompleto = $nomeCompleto;
$usuarioModel->dataNascimento = $dataNasc;
$usuarioModel->email = $email;
$usuarioModel->senha = $senha;
$usuarioModel->telefone = $fone;

$retorno = $usuarioModel->cadastrar();
// saida
echo json_encode($retorno);