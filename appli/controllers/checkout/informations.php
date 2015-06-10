<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informations extends CI_Controller {

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
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['user'] = $this->session->userdata('user')[0];
            $data['voyage'] = $this->session->userdata('voyage');
            $data['destination'] = $this->session->userdata('destination');
            
            $this->load->view('template/header');
            $this->load->view('checkout/adresses',$data);
            $this->load->view('template/footer');
	}
        
        
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */