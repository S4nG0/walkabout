<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voyages extends CI_Model {

    protected $table = 'voyage';
    
    
    public function constructeur($id = 0){
        
        if($id == 0){
            return false;
        }
        
        $destination = $this->db->select('*')
                           ->from($this->table)
                           ->where('idVoyage', $id)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $destination;
    }  
    
    
    public function get_voyages_from_destination($idDestination = 0){
        
        if($idDestination == 0){
            return false;
        }
        
        $voyages = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $idDestination)
                           ->get()
                           ->result();
        
        return $voyages;
    }  
    
    
    
    public function select_min_prix($id = 0){
        
        if($id == 0){
            return false;
        }
        $prix = $this->db->select_min('prix')
                       ->from($this->table)
                       ->where('idDestination', $id)
                       ->get()
                       ->result()[0]->prix;
         
        return $prix;
    }
}
