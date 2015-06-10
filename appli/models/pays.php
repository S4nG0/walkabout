<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pays extends CI_Model {

    protected $table = 'pays';
    
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $pays = $this->db->select('*')
                           ->from($this->table)
                           ->where('idPays', $id)
                           ->get()
                           ->result();
        
        return $pays;
    }
  
    
    
    
    
    
}
