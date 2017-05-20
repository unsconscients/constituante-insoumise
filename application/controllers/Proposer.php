<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposer extends CI_Controller {

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

		$this->load->view('header');

			$this->load->view('proposer', $this->session->userdata('logged'));

		$this->load->view('footer');
	}

	public function proposition()
	{

		if($this->session->userdata('logged') != null &&
			$this->input->post('titre') != null &&
			$this->input->post('mots') != null &&
			$this->input->post('contenu') != null){

			// On a au moins des coordonnés, on continue...
			// On part également du principe que toutes les inputs du formulaire
			// existent et sont != null .

			$this->load->model('proposition');

			$proposition = array(
				"id_user" => $this->session->userdata('logged')['id'],

				"titre" => $this->input->post('titre'),
				"mots_cles" => $this->input->post('mots'),
				"contenu" => $this->input->post('contenu')
			);

			$ok = $this->proposition->ajouter_propositon($proposition);

			redirect('/soutenir');
		}
	}


	public function confirmation($id = ''){

		if($id != null && $id != ''){

			$this->load->model('proposition');
			$this->proposition->confirmer($id);

			$this->load->view('header');
				$this->load->view('msg_confirmation_email');
			$this->load->view('footer');

		}


	}


}
