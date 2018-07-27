<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormUtils
 *
 * @author JONATHAN
 */
class FormUtils {
    
    private function __construct() {
        
    }

    public static function isInsert($acao) : bool {
        return $acao == "inserir";
    }
    
    public static function isUpdate($acao) : bool {
        return $acao == "alterar";
    }
    
    public static function convertToDatabaseDate($date) {
        $time  = strtotime($date);
        $day   = date('d',$time);
        $month = date('m',$time);
        $year  = date('Y',$time);
        return "$year-$month-$day";
    }
        
}
