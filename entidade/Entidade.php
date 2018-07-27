<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entidade
 *
 * @author JONATHAN
 */
abstract class Entidade {
    
    private $id;
    
    public function __contructor() {
        
    }
    
    public function __constructor($id) {
        $this->setId($id);
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
}
