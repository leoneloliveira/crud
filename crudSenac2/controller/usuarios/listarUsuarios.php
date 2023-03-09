<?php 

require_once('../../config/Conexao.php');
require_once('../../model/UsuarioModel.php');

$conexao = new Conexao();
$db = $conexao->abrirConexao();

$usuarioModel = new UsuarioModel($db);
$dados = $usuarioModel->lerTodos();
echo json_encode($dados);