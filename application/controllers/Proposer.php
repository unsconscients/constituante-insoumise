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

		$this->load->helper('url');

		$this->load->view('header');

			$this->load->view('proposer');

		$this->load->view('footer');
	}


	public function propose()
	{

		if($this->input->post('pseudo') != null && $this->input->post('email') != null){

			// On a au moins des coordonnés, on continue...
			// On part également du principe que toutes les inputs du formulaire
			// existent et sont != null .

			$proposition = array(
				"pseudo" => $this->input->post('pseudo'),
				"email" => $this->input->post('email'),

				"titre" => $this->input->post('titre'),
				"mots_cles" => $this->input->post('mots'),
				"contenu" => $this->input->post('contenu')
			);

			echo json_encode($proposition);
			
		}


	}

}
