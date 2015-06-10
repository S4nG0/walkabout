<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carnet extends CI_Controller {

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
         * 
	 */
        
        public function load_all()
	{
            $data = array(); 
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $this->load->view('template/header');
            $count = $this->db->count_all('carnetdevoyage');
            /*Load des helpers et librairies*/
            $this->load->helper('form');
            $this->load->library('pagination');
            /*Parametrage de la pagination*/
            $config['base_url'] = base_url().'carnet/page';
            $config['total_rows'] = $count;// faire attention taille totale
            $nb_articles = $config['per_page'] = 10; 
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['last_link'] = 'Dernier';
            $config['first_link'] = 'Premier';
            /*Initialisation de la pagination*/
            $this->pagination->initialize($config);
            /*Affichage de la pagination*/
            echo $this->pagination->create_links();
            /*Création des variables de selection des carnets*/
            $page = $this->pagination->cur_page;
            $start = ($page*$nb_articles)-$nb_articles;
            /*
             * Recherche des carnets
             * On a donc besoin du carnet,
             * de l'utilisateur du carnet
             * du voyage de ce carnet,
             * de la destination du carnet
            */
            $data['carnets'] = $this->carnetvoyage->get_carnet_pagination($start,$nb_articles);
            $data['nonfavoris'] = array();
            foreach($data['carnets'] as $carnet){
                $carnet->date = conv_date($carnet->date);
                $carnet->user = $this->user->constructeur($carnet->idUsers);
                $carnet->voyage = $this->voyages->constructeur($carnet->idVoyage);
                $carnet->destination = $this->destination->constructeur($carnet->idDestination);
                $carnet->pays = $this->pays->constructeur($carnet->destination[0]->idPays);
                if($carnet->favoris == 'true'){
                    $data['favoris'] = $carnet;
                }else{
                    array_push($data['nonfavoris'],$carnet);
                }
            }
            $this->load->view('carnets', $data);
            $this->load->view('template/footer');
            //$this->output->enable_profiler(true);
	}
        
        
        public function load_carnet($id_carnet){
            $data = array();
            
            $data['commentaire'] = $this->session->flashdata('commentaire');
            
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $this->load->view('template/header');
            $data['carnet'] = $this->carnetvoyage->constructeur($id_carnet); 
            $data['carnet'][0]->date = conv_date($data['carnet'][0]->date);
            $data['user'] = $this->user->constructeur($data['carnet'][0]->idUsers);
            $data['destination'] = $this->destination->constructeur($data['carnet'][0]->idDestination);
            $data['pays'] = $this->pays->constructeur($data['destination'][0]->idPays);
            $data['articles'] = $this->articles->constructeur($data['carnet'][0]->idCarnetDeVoyage);
            $data['commentaires'] = $this->commentaires->constructeur($data['carnet'][0]->idCarnetDeVoyage);
            foreach($data['commentaires'] as $commentaire){
                $commentaire->date = conv_date($commentaire->date);
                $commentaire->user = $this->user->constructeur($commentaire->idUsers);
            }
            $this->load->view('carnetdevoyage', $data);
            $this->load->view('template/footer');
        }
	
        public function _remap($id,$id2 = '')
        {
            if($id == 'index'){
                $this->load_all();
            }else{
                $this->load_carnet($id);
            }
        }
        
}

/* End of file carnet.php */
/* Location: ./application/controllers/carnet.php */