<?php

require_once 'config.php';

// Carrega um usuário:
//$usuario = new Usuario();
//$usuario->loadById(2);
//echo $usuario;

// Carrega uma lista de usuários:
$lista = Usuario::getList();
echo json_encode($lista);

// Carrega uma lista de usuários buscando pelo login:
//$busca = Usuario::search('bi');
//echo json_encode($busca);

// Carrega usuário usando login e senha:
//$usuario = new Usuario();
//$usuario->login('bibi', '555555');
//echo $usuario;

// Adiciona um novo usuário:
//$usuario = new Usuario();
//$usuario->setDeslogin('jean');
//$usuario->setDessenha('123456');
//$usuario->insert();
//echo $usuario;

//$usuario = new Usuario();
//$usuario->loadById(4);
//$usuario->update('jean.carlos', '464646');
//echo $usuario;

// Deleta um usuário:
//$usuario = new Usuario();
//$usuario->loadById(6);
//$usuario->delete();
//echo $usuario;