<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Infos_complementaires extends CI_Model {

    protected $table = 'infoscomplementaire';
    
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $infos = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $id)
                           ->get()
                           ->result();
        
        return $infos;
    }
  
    
    
    
    
    
}
