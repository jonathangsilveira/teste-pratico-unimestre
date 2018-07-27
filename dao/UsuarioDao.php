<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginDao
 *
 * @author JONATHAN
 */
class UsuarioDao implements Dao {
    
    private $conexao;

    public function __construct(mysqli $conexao) {
        $this->conexao = $conexao;
    }
    
    public function alterar($entidade) {
        $id = $entidade->getId();
        $login = $entidade->getLogin();
        $senha = $entidade->getSenha();
        $email = $entidade->getEmail();
        $sql = "UPDATE usuario SET login = ?, senha = ?, email = ? WHERE id = ?";
        $declaracao = $this->conexao->prepare($sql);
        $declaracao->bind_param("sssi", $login, $senha, $email, $id);
        $declaracao->execute();
        $declaracao->close();
    }

    public function buscar() {
        $sql = "SELECT * FROM usuario";
        $resultados = $this->conexao->query($sql);
        $usuarios = array();
        if ($resultados->num_rows > 0) {
            while($resultado = $resultados->fetch_assoc()) {
                $usuarios[] = $this->mapearUsuario($resultado);
            }
        }
        return $usuarios;        
    }

    public function buscarPeloId($id) {
        $sql = "SELECT * FROM usuario WHERE id = $id";
        $resultados = $this->conexao->query($sql);
        $usuarios = array();
        if ($resultados->num_rows > 0) {
            while($resultado = $resultados->fetch_assoc()) {
                $usuarios[] = $this->mapearUsuario($resultado);
            }
        }
        return $usuarios;
    }

    public function inserir($entidade) : int {
        $login = $entidade->getLogin();
        $senha = $entidade->getSenha();
        $email = $entidade->getEmail();
        $sql = "INSERT INTO usuario (login, senha, email) VALUES (?, ?, ?)";
        $declaracao = $this->conexao->prepare($sql);
        $declaracao->bind_param("sss", $login, $senha, $email);
        $declaracao->execute();
        $idGerado = $declaracao->insert_id;
        $declaracao->close();
        return $idGerado;
    }
    
    private function mapearUsuario($resultado) : Usuario {
        $usuario = new Usuario();
        $usuario->setId($resultado["id"]);
        $usuario->setLogin($resultado["login"]);
        $usuario->setSenha($resultado["senha"]);
        $usuario->setEmail($resultado["email"]);
        return $usuario;
    }
    
    public function buscarPeloLogin($login, $senha) {
        $sql = "SELECT * FROM usuario WHERE login = '$login' AND "
                . "senha = '$senha'";
        $resultados = $this->conexao->query($sql);
        $usuarios = array();
        if ($resultados->num_rows > 0) {
            while($resultado = $resultados->fetch_assoc()) {
                $usuarios[] = $this->mapearUsuario($resultado);
            }
        }
        return $usuarios[0];
    }

}
