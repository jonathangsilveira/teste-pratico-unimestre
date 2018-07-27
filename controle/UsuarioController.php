<?php

require_once "dao/Dao.php";
require_once "dao/UsuarioDao.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author JONATHAN
 */
class UsuarioController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    private function inserir(mysqli $conexao, Usuario $usuario) : int {
        $dao = new UsuarioDao($conexao);
        return $dao->inserir($usuario);
    }
    
    private function alterar(mysqli $conexao, Usuario $usuario) {
        $dao = new UsuarioDao($conexao);
        $dao->alterar($usuario);
    }
    
    public function gravar(Usuario $usuario) : int {
        $conexao = $this->conectarDatabase();
        $this->iniciarTransacao($conexao);
        $id = $usuario->getId();
        if ($usuario->getId() > 0) {
            $this->alterar($conexao, $usuario);
        } else {
            $id = $this->inserir($conexao, $usuario);
        }
        $this->commitTransacao($conexao);
        $this->finalizarTransacao($conexao);
        return $id;
    }
    
    public function buscar() {
        $conexao = $this->conectarDatabase();
        $this->finalizarTransacao($conexao);
        $dao = new UsuarioDao($conexao);
        $usuarios = $dao->buscar();
        $this->finalizarTransacao($conexao);
        return $usuarios;
    }
    
    public function buscarPeloId($id) : Usuario {
        $conexao = $this->conectarDatabase();
        $dao = new UsuarioDao($conexao);
        $usuarios = $dao->buscarPeloId($id);
        $this->finalizarTransacao($conexao);
        return $usuarios[0]; 
    }
    
    public function buscarPeloLoginSenha($login, $senha) : Usuario {
        $conexao = $this->conectarDatabase();
        $dao = new UsuarioDao($conexao);
        $usuario = $dao->buscarPeloLogin($login, $senha);
        $this->finalizarTransacao($conexao);
        return $usuario;
    }
    
}
