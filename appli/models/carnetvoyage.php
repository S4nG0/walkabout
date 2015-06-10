<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carnetvoyage extends CI_Model {

    protected $table = 'carnetdevoyage';
    
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $carnet = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnetDeVoyage', $id)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $carnet;
    }
    
    
    public function get_carnets_alea($idDestination = 0){
        if($idDestination != 0){
            $carnets = $this->db->select('*')
                               ->from($this->table)
                               ->where('publie', 'true')
                               ->where('idDestination', $idDestination)
                               ->order_by('rand()')
                               ->limit(4)
                               ->get()
                               ->result();
        }else{
            $carnets = $this->db->select('*')
                               ->from($this->table)
                               ->where('publie', 'true')
                               ->order_by('rand()')
                               ->limit(4)
                               ->get()
                               ->result();
        }
        
        return $carnets;
        
    }
    
    
    public function get_carnet_pagination($start,$nb){
        
        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('publie', 'true')
                           ->limit($nb, $start)
                           ->get()
                           ->result(); 
            
        return $carnets;
        
    }
    
    public function get_carnet_for_user($id=''){
        
        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('idUsers', $id)
                           ->get()
                           ->result(); 
            
        return $carnets;
        
    }
    
}
