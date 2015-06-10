<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Commentaires extends CI_Model {

    protected $table = 'commentaires';
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $actu = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id)
                           ->where('modere','true')
                           ->order_by('idCommentaires','ASC')
                           ->get()
                           ->result();
        
        return $actu;
    }
    
    
    public function add($commentaire){
        
        $result = $this->db->insert($this->table, $commentaire); 
        
        return $result;
    }

}
