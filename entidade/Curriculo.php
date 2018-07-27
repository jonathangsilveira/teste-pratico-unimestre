<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Curriculo
 *
 * @author JONATHAN
 */
class Curriculo extends Entidade {
    
    private $nome;
    
    private $email;
    
    private $cpf;
    
    private $dataNascimento;
    
    private $sexo;
    
    private $estadoCivil;
    
    private $escolaridade;
    
    private $especializacoes;
    
    private $experienciasProfissionais;
    
    private $dataCadastro;
    
    private $idUsuario;
    
    public function __contructor() {
        parent::__contructor();
    }
    
    public function __constructor($id) {
        parent::__constructor($id);
    }
    
    public function getNome() {
        return $this->nome;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getCpf() {
        return $this->cpf;
    }
    
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    
    public function getDataNascimento() {
        return $this->dataNascimento;
    }
    
    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }
    
    public function getSexo() {
        return $this->sexo;
    }
    
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    
    public function getEstadoCivil() {
        return $this->estadoCivil;
    }
    
    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }
    
    public function getEscolaridade() {
        return $this->escolaridade;
    }
    
    public function setEscolaridade($escolaridade) {
        $this->escolaridade = $escolaridade;
    }
    
    public function getEspecializacoes() {
        return $this->especializacoes;
    }
    
    public function setEspecializacoes($especializacoes) {
        $this->especializacoes = $especializacoes;
    }
    
    public function getExperienciasProfissionais() {
        return $this->experienciasProfissionais;
    }
    
    public function setExperienciasProfissionais($experienciasProfissionais) {
        $this->experienciasProfissionais = $experienciasProfissionais;
    }
    
    public function getDataCadastro() {
        return $this->dataCadastro;
    }
    
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
}
