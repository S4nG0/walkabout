<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conclusion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $data = array();
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $data['voyage'] = $this->session->userdata('voyage');
            $data['destination'] = $this->session->userdata('destination');
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            if($data['voyage'] == false){
                redirect('/voyage');
            }
            
            $donnee = array(
                'idVoyage' => $this->session->userdata('voyage'),
                'idUsers' => $this->session->userdata('user')[0]->idUsers,
                'nb_personnes' => $this->input->post('nb_personne'),
                'date' => date('Y-m-d')
            );
            
            $result = $this->reservations->insert($donnee);
            
             $donnee2 = array(
                'idReservation' => $result,
                'etat' => "En cours"
            );
             
            $this->etat_reservation->insert($donnee2);
            
            $this->session->unset_userdata('voyage');
            $this->session->unset_userdata('destination');
            
            $this->load->view('template/header');
            $this->load->view('checkout/conclusion',$data);
            $this->load->view('template/footer');
	}
        
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */