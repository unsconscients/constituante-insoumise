<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soutenir extends CI_Controller {

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

		$this->load->model('proposition');

		$this->load->view('header');

			$propositions = $this->proposition->get_propositions(true);

			$this->load->view('soutenir_acceuil', array(
				"propositions" => $propositions
			));


		$this->load->view('footer');
	}


	public function proposition($id = '', $pour_contre = '')
	{

		$this->load->model('proposition');

		if($id != '' && $pour_contre != ''){

			if($this->session->userdata('logged') == null){
				redirect('/users/login?erreur=Vous devez être connecté pour voter pour/contre une proposition.');
			} else {
				$this->load->model('proposition');
				$this->proposition->pour_contre($id, $pour_contre);
				redirect('/soutenir/proposition/'.$id);
			}

		} else if ($id != ''){

			$this->load->view('header');
				$proposition = $this->proposition->get_proposition($id);

				$this->load->view('soutenir_proposition', array(
					'proposition' => $proposition
				));
			$this->load->view('footer');

		} else {
			redirect();
		}



	}


}
