<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author JONATHAN
 */
interface Dao {
    
    public function inserir($entidade) : int;
    
    public function alterar($entidade);
    
    public function buscar();
    
    public function buscarPeloId($id);
    
}
