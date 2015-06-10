<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Etat_reservation extends CI_Model {

    protected $table = 'etatreservation';
    
    
    public function constructeur($id = 0){
        
        if($id == 0){
            return false;
        }
        
        $etat = $this->db->select('*')
                           ->from($this->table)
                           ->where('idReservation', $id)
                           ->get()
                           ->result();
        
        return $etat;
    }  
    
    public function insert($data = ''){
        if($data == ''){
            return false;
        }
        
        $etat_reservation = $this->db->insert($this->table, $data);
        
        return $etat_reservation;
    }
    
    
    
}
