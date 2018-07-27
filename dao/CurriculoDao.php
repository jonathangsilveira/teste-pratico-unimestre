<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CurriculoDao
 *
 * @author JONATHAN
 */
class CurriculoDao implements Dao {

    private $conexao;

    public function __construct(mysqli $conexao) {
        $this->conexao = $conexao;
    }
    
    public function alterar($entidade) {
        $id = $entidade->getId();
        $nome = $entidade->getNome();
        $cpf = $entidade->getCpf();
        $dataNascimento = $entidade->getDataNascimento();
        $sexo = $entidade->getSexo();
        $estadoCivil = $entidade->getEstadoCivil();
        $escolaridade = $entidade->getEscolaridade();
        $especializacoes = $entidade->getEspecializacoes();
        $experienciasProfissionais = $entidade->getExperienciasProfissionais();
        $sql = "UPDATE curriculo SET nome = ?, cpf = ?, data_nascimento = ?,"
                . "sexo = ?, estado_civil = ? ,escolaridade = ?, "
                . "especializacoes = ?, experiencia_profissional = ? "
                . "WHERE id = ?;";
        $declaracao = $this->conexao->prepare($sql);
        $declaracao->bind_param("ssssiissi", $nome, $cpf, $dataNascimento, 
                $sexo, $estadoCivil, $escolaridade, $especializacoes, 
                $experienciasProfissionais, $id);
        $declaracao->execute();
        $declaracao->close();
    }

    public function buscar() {
        $sql = "SELECT * FROM curriculo";
    }

    public function buscarPeloId($id) {
        $sql = "SELECT * FROM curriculo WHERE id = $id";
        $resultados = $this->conexao->query($sql);
        $curriculos = array();
        if ($resultados->num_rows > 0) {
            while($resultado = $resultados->fetch_assoc()) {
                $curriculos[] = $this->mapearCurriculo($resultado);
            }
        }
        return $curriculos;
    }
    
    public function buscarPeloUsuario($idUsuario) {
        $sql = "SELECT * FROM curriculo WHERE id_usuario = $idUsuario";
        $resultados = $this->conexao->query($sql);
        $curriculos = array();
        if ($resultados->num_rows > 0) {
            while($resultado = $resultados->fetch_assoc()) {
                $curriculos[] = $this->mapearCurriculo($resultado);
            }
        }
        return $curriculos;
    }

    public function inserir($entidade) : int {
        $nome = $entidade->getNome();
        $cpf = $entidade->getCpf();
        $dataNascimento = $entidade->getDataNascimento();
        $sexo = $entidade->getSexo();
        $estadoCivil = $entidade->getEstadoCivil();
        $escolaridade = $entidade->getEscolaridade();
        $especializacoes = $entidade->getEspecializacoes();
        $experienciasProfissionais = $entidade->getExperienciasProfissionais();
        $dataCadastro = $entidade->getDataCadastro();
        $sql = "INSERT INTO curriculo (nome, cpf, data_nascimento, sexo, estado_civil, "
                . "escolaridade, especializacoes, experiencia_profissional, "
                . "data_cadastro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $declaracao = $this->conexao->prepare($sql);
        $declaracao->bind_param("ssssiisss", $nome, $cpf, $dataNascimento, 
                $sexo, $estadoCivil, $escolaridade, $especializacoes, 
                $experienciasProfissionais, $dataCadastro);
        $declaracao->execute();
        $idGerado = $declaracao->insert_id;
        $declaracao->close();
        return $idGerado;
    }
    
    private function mapearCurriculo($resultado) : Curriculo {
        $curriculo = new Curriculo();
        $curriculo->setId($resultado["id"]);
        $curriculo->setNome($resultado["nome"]);
        $curriculo->setCpf($resultado["cpf"]);
        $curriculo->setDataNascimento($resultado["data_nascimento"]);
        $curriculo->setSexo($resultado["sexo"]);
        $curriculo->setEstadoCivil($resultado["estado_civil"]);
        $curriculo->setEscolaridade($resultado["escolaridade"]);
        $curriculo->setEspecializacoes($resultado["especializacoes"]);
        $curriculo->setExperienciasProfissionais($resultado["experiencia_profissional"]);
        $curriculo->setDataCadastro($resultado["data_cadastro"]);
        return $curriculo;
    }

}
