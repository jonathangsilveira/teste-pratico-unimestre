<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "utils/FormUtils.php";
require_once "entidade/Entidade.php";
require_once "entidade/Usuario.php";
require_once "controle/Controller.php";
require_once "controle/UsuarioController.php";

$login = filter_input(INPUT_POST, "login");
$senha = filter_input(INPUT_POST, "senha");
$controller = new UsuarioController();
$usuario = $controller->buscarPeloLoginSenha($login, $senha);
if ($usuario != null) {
    session_start();
    $_SESSION["idUsuario"] = $usuario->getId();
    header("Location: cadastrocurriculo.php?acao=alterar");
} else {
    $erro = "Usuário inválido ou não cadastrado";
    header("Location: login.php?concluido=false&erro=$erro");
}