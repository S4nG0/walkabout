<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Infos_destination extends CI_Model {

    protected $table = 'infosdestinations';
    
    
    public function constructeur($idDestination = 0){
        if($idDestination == 0){
            return false;
        }
        
        $infos = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $idDestination)
                           ->get()
                           ->result();
        
        return $infos;
    }
  
    
    
    
    
    
}
