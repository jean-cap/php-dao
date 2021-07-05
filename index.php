<?php

require_once 'config.php';

// Carrega um usuário:
//$usuario = new Usuario();
//$usuario->loadById(2);
//echo $usuario;

// Carrega uma lista de usuários:
//$lista = Usuario::getList();
//echo json_encode($lista);

// Carrega uma lista de usuários buscando pelo login:
//$busca = Usuario::search('bi');
//echo json_encode($busca);

// Carrega usuário usando login e senha:
$usuario = new Usuario();
$usuario->login('bibi', '555555');
echo $usuario;
