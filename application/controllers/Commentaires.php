<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commentaires extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		redirect();

	}


  public function ajouter($id_proposition = '')
  {
		if($id_proposition != '' && $this->input->post('pseudo') != null && $this->input->post('email') != null && $this->input->post('contenu' != null)) {

			$id_user = 0;
			if($this->session->userdata('logged') != null){
				$id_user = intval($this->sessions->userdata('logged')['id']);
			}

			$this->load->model('commentaire');
			$this->commentaire->ajouter(
				$id_proposition,
				$id_user,
				$this->input->post('pseudo'),
				$this->input->post('email'),
				$this->input->post('contenu')
			);

			redirect('/soutenir/proposition/'.$id_proposition);

		}

  }


}
