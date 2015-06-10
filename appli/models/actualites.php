<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actualites extends CI_Model {

    protected $table = 'actualites';
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $actu = $this->db->select('*')
                           ->from($this->table)
                           ->where('idActualite', $id)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $actu;
    }

    public function get_actus() {
        $actus = $this->db->select('*')
                ->from($this->table)
                ->where('publie', 'true')
                ->limit(3)
                ->order_by('idActualites','DESC')
                ->get()
                ->result();
        
        return $actus;
    }
    
    public function get_all_actus() {
        $actus = $this->db->select('*')
                ->from($this->table)
                ->where('publie', 'true')
                ->order_by('idActualites','DESC')
                ->get()
                ->result();
        
        return $actus;
    }

}
