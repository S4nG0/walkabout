<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voyage extends CI_Controller {

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
            
            $data['destinations'] = $this->destination->get_all();
            foreach($data['destinations'] as $destination){
                $destination->pays = $this->pays->constructeur($destination->idPays);
                $destination->prix_min = $this->voyages->select_min_prix($destination->idDestination);
            }
            $this->load->view('template/header');
            /*Mettre le include de la page nos destinations ici*/
            $this->load->view('voyages',$data);
            $this->load->view('template/footer');
	}
        
        public function load_voyage($id)
        {
            $data = array();
            
            $data['destination'] = $this->destination->constructeur($id);
            $data['infos_pays'] = $this->pays->constructeur($data['destination'][0]->idPays);
            $data['infos_destination'] = $this->infos_destination->constructeur($data['destination'][0]->idDestination);
            $data['infos_complementaires'] = $this->infos_complementaires->constructeur($data['destination'][0]->idDestination);
            $data['voyages'] = $this->voyages->get_voyages_from_destination($data['destination'][0]->idDestination);
            $data['carnets'] = $this->carnetvoyage->get_carnets_alea($data['destination'][0]->idDestination);
            foreach($data['carnets'] as $carnet){
                $carnet->date = conv_date($carnet->date);
                $carnet->user = $this->user->constructeur($carnet->idUsers);
            }
            //var_dump($data['carnets']);
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $this->load->view('template/header');
            $this->load->view('destination',$data);
            $this->load->view('template/footer');
            //$this->output->enable_profiler(TRUE);
        }
        
        public function _remap($id){
            if($id > 0){
                $this->load_voyage($id);
            }
            else{
                $this->index();
            }
        }
}

/* End of file voyage.php */
/* Location: ./application/controllers/voyage.php */