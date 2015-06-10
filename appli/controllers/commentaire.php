<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commentaire extends CI_Controller {

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
	public function add($idCarnet = 0)
	{
            if($idCarnet == 0){
                return false;
            }
           
            $user = connecte($this->session->userdata('user'));
            
            if($user === true){
                $this->form_validation->set_rules('message','"Message"', 'trim|required|xss_clean|min_length[50]');
            }else{
                //Mettre les rules formulaire quand on est pas connecte!
                $this->form_validation->set_rules('last-name','"Nom"', 'trim|required|xss_clean');
                $this->form_validation->set_rules('first-name','"Prénom"', 'trim|required|xss_clean');
                $this->form_validation->set_rules('email','"Email"', 'trim|required|xss_clean|valid_email');
                $this->form_validation->set_rules('message','"Message"', 'trim|required|xss_clean|min_length[50]');
            }
            
            if($this->form_validation->run()){
                $data = array();
                $commentaire = new stdClass();
                $commentaire->texte = $this->input->post('message');
                $commentaire->idCarnet = $idCarnet;
                if($user === true){
                    $commentaire->idUsers = $this->session->userdata('user')[0]->idUsers;
                    $data['nom'] = $this->session->userdata('user')[0]->nom;
                    $data['prenom'] = $this->session->userdata('user')[0]->prenom;
                    $data['email'] = $this->session->userdata('user')[0]->mail;
                }else{
                    $commentaire->idUsers = 3;
                    $data['nom'] = $this->input->post('last-name');
                    $data['prenom'] = $this->input->post('first-name');
                    $data['email'] = $this->input->post('email');
                }
                $commentaire->date = Date('Y-m-d');
                $commentaire->modere = 'false';
                $commentaire->data = json_encode($data);
                $array = get_object_vars($commentaire);
                
                //envoyer le commentaire! :)
                $result = $this->commentaires->add($array);
                if($result == true){
                    $this->session->set_flashdata('commentaire', 'reussi');
                    redirect('/carnet/'.$idCarnet);
                }else{
                    $this->session->set_flashdata('commentaire', 'fail');
                    redirect('/carnet/'.$idCarnet);
                }
            }
            
            redirect($_SERVER["HTTP_REFERER"]);
           
	}
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */