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
    
    private static $instance;
    
    private $conexao;
    
    private function __constructor() {
        
    }
    
    public static function getInstance(mysqli $conexao) {
        if (!isset(self::$instance)) {
            self::$instance = new CurriculoDao();
        }
        self::$instance->conexao = $conexao;
        return self::$instance;
    }
    
    public function alterar($entidade) {
        
    }

    public function buscar() {
        $sql = "SELECT * FROM curriculo";
    }

    public function buscarPeloId($id) {
        $sql = "SELECT * FROM curriculo WHERE id = $id";
        $resultados = self::$instance->conexao->query($sql);
        $curriculos = array();
        if ($resultados->num_rows > 0) {
            while($resultado = $resultados->fetch_assoc()) {
                $curriculos[] = $this->mapearCurriculo($resultado);
            }
        }
        return $curriculos;
    }

    public function inserir($entidade) {
        printf($entidade);
        printf("trying to insert...");
        /*$sql = "INSERT INTO (nome, cpf, data_nascimento, sexo, estado_civil, "
                . "escolaridade, especializacoes, experiencia_profissional, "
                . "data_cadastro) VALUES ('$entidade->getNome()', "
                . "$entidade->getCpf(), '$entidade->getDataNascimento()', "
                . "'$entidade->getSexo()', $entidade->getEstadoCivil(), "
                . "$entidade->getEscolaridade(), "
                . "'$entidade->getEspecializacoes()', "
                . "'$entidade->getExpecienciasProfissionais()', "
                . "'$entidade->getDataCadastro()')";*/
        $sql = "INSERT INTO (nome, cpf, data_nascimento, sexo, estado_civil, "
                . "escolaridade, especializacoes, experiencia_profissional, "
                . "data_cadastro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $declaracao = $this->conexao->prepare($sql);
        $declaracao->bind_param("ssssiisss", $entidade->getNome(), 
                $entidade->getCpf(), $entidade->getDataNascimento(), 
                $entidade->getSexo(), $entidade->getEstadoCivil(), 
                $entidade->getEscolaridade(), $entidade->getEspecializacoes(), 
                $entidade->getExpecienciasProfissionais(), 
                $entidade->getDataCadastro());
        $declaracao->execute();
        printf("Inserted: $declaracao->inserd_id");
        $declaracao->close();
    }
    
    private function mapearCurriculo($resultado) : Curriculo {
        $curriculo = new Curriculo();
        //TODO
        return $curriculo;
    }

}
