<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moncompte extends CI_Controller {

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
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == false){
                redirect('/connexion');
            }else{
                $data['user'] = $this->session->userdata('user')[0];
                $data['reservations'] = $this->reservations->constructeur($data['user']->idUsers);
                if(sizeof($data['reservations']) > 0){
                    foreach( $data['reservations'] as $reservation){
                        $reservation->voyage = $this->voyages->constructeur($reservation->idVoyage); 
                        $reservation->destination = $this->destination->constructeur($reservation->voyage[0]->idDestination);
                        $reservation->pays = $this->pays->constructeur($reservation->destination[0]->idPays);
                        $reservation->voyage[0]->date_depart = conv_date($reservation->voyage[0]->date_depart);
                        $reservation->voyage[0]->date_retour = conv_date($reservation->voyage[0]->date_retour);
                        $reservation->date = conv_date($reservation->date);
                        $reservation->etatreservation = $this->etat_reservation->constructeur($reservation->idReservation)[0]->etat;
                    }
                }
                $data['carnets'] = $this->carnetvoyage->get_carnet_for_user($data['user']->idUsers);
                foreach($data['carnets'] as $carnet){
                    $carnet->date = conv_date($carnet->date);
                    $carnet->user = $this->user->constructeur($carnet->idUsers);
                    $carnet->voyage = $this->voyages->constructeur($carnet->idVoyage);
                    $carnet->destination = $this->destination->constructeur($carnet->idDestination);
                    $carnet->pays = $this->pays->constructeur($carnet->destination[0]->idPays);
                    $carnet->voyage[0]->date_depart = conv_date($carnet->voyage[0]->date_depart);
                    $carnet->voyage[0]->date_retour = conv_date($carnet->voyage[0]->date_retour);
                }
                $this->load->view('template/header');
                $this->load->view('moncompte',$data);
                $this->load->view('template/footer');
            }
            
	}
        
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */