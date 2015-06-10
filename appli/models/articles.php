<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Model {

    protected $table = 'articles';
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $actu = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id)
                           ->limit(4)
                           ->get()
                           ->result();
        
        return $actu;
    }

}
