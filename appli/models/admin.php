<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Model {

    protected $table = 'administrateur';
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $admin = $this->db->select('*')
                           ->from($this->table)
                           ->where('idAdministrateur', $id)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $admin;
    }

}
