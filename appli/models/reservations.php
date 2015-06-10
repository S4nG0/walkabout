<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reservations extends CI_Model {

    protected $table = 'reservation';
    
    
    public function constructeur($id = 0){
        
        if($id == 0){
            return false;
        }
        
        $reservations = $this->db->select('*')
                           ->from($this->table)
                           ->where('idUsers', $id)
                           ->get()
                           ->result();
        
        return $reservations;
    }  
    
    public function insert($data = ''){
        if($data == ''){
            return false;
        }
        
        $this->db->insert($this->table, $data);
        
        $reservation = $this->db->insert_id();
        
        return $reservation;
    }
    
    
    public function count($id = 0){
        
        if($id == 0){
            return false;
        }
        $nb = $this->db->select_sum('nb_personnes')
                       ->from($this->table)
                       ->where('idVoyage', $id)
                       ->get()
                       ->result()[0]->nb_personnes;
        
        if($nb == NULL){
            $nb = 0;
        }   
        return $nb;
    }  
    
}
