<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Destination extends CI_Model {

    protected $table = 'destination';
    
    
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $destination = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $id)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $destination;
    }  
    
    public function get_all(){
        
        $destinations = $this->db->select('*')
                           ->from($this->table)
                           ->get()
                           ->result();
        
        return $destinations;
    }
    
}
