<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Payement extends CI_Controller {

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
            
            
            $data['nb_places_restantes'] = $this->voyages->constructeur($data['voyage'])[0]->nb_places - $this->reservations->count($data['destination']);
            $data['voyage'] = $this->voyages->constructeur($data['voyage'])[0];
            $data['voyage']->date_depart = conv_date($data['voyage']->date_depart);
            $data['voyage']->date_retour = conv_date($data['voyage']->date_retour);
            $data['destination'] = $this->destination->constructeur($data['destination'])[0];
            $data['pays'] = $this->pays->constructeur($data['destination']->idPays)[0];
            
            $this->load->view('template/header');
            $this->load->view('checkout/payement',$data);
            $this->load->view('template/footer');
	}
        
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */