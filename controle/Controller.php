<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author JONATHAN
 */
abstract class Controller {
    
    protected function __construct() {
        
    }
    
    protected function conectarDatabase() {
        return new mysqli("localhost", "root", "", "curriculos");
    }
    
    protected final function iniciarTransacao($conexao) {
        $conexao->autocommit(FALSE);;
    }
    
    protected final function iniciarConsulta($conexao) {
        $conexao->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);
    }
    
    protected final function finalizarTransacao($conexao) {
        $conexao->close();
    }
    
    protected final function commitTransacao($conexao) {
        $conexao->commit();
    }

}
