<?php

require_once "dao/Dao.php";
require_once "dao/CurriculoDao.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CurriculoController
 *
 * @author JONATHAN
 */
class CurriculoController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    private function inserir(mysqli $conexao, Curriculo $curriculo) {
        $dao = new CurriculoDao($conexao);
        $dao->inserir($curriculo);
    }
    
    private function alterar(mysqli $conexao, Curriculo $curriculo) {
        $dao = new CurriculoDao($conexao);
        $dao->alterar($curriculo);
    }
    
    public function gravar(Curriculo $curriculo) {
        $conexao = $this->conectarDatabase();
        $this->iniciarTransacao($conexao);
        if ($curriculo->getId() > 0) {
            $this->alterar($conexao, $curriculo);
        } else {
            $this->inserir($conexao, $curriculo);
        }
        $this->commitTransacao($conexao);
        $this->finalizarTransacao($conexao);
    }
    
    public function buscar() {
        
    }
    
    public function buscarPeloId($id) : Curriculo {
        $conexao = $this->conectarDatabase();
        $dao = new CurriculoDao($conexao);
        $curriculos = $dao->buscarPeloId($id);
        $this->finalizarTransacao($conexao);
        return $curriculos[0]; 
    }
    
}
