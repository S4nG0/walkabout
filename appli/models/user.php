<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Model {

    protected $table = 'users';

    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $user = $this->db->select('*')
                           ->from($this->table)
                           ->where('idUsers', $id)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $user;
    }
    
    public function select($email = ''){
        if($email == ''){
            return false;
        }
        
        $user = $this->db->select('*')
                           ->from($this->table)
                           ->where('mail', $email)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $user;
    }
    
    public function insert($data = ''){
        if($data == ''){
            return false;
        }
        
        $user = $this->db->insert($this->table, $data); 
        
        return $user;
    }
    
    public function confirmation($email = '',$code =''){
        if($email == '' || $code == ''){
            return false;
        }
        
        $user = $this->db->select('num_activation, active')
                         ->from($this->table)
                         ->where('mail',$email)
                         ->limit(1)
                         ->get()
                         ->result();
        
        
        if($code == $user[0]->num_activation){
            if($user[0]->active == "true"){
                $result = "active";
            }else{
                    $data = array(
                        'active' => 'true'
                    );
                    $this->db->where('mail',$email);
                    $this->db->update($this->table, $data); 
                    
                    $result = "done";
            }
        }else{
            return false;
        }
        
        return $result;
    }

}
