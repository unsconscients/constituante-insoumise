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
	public function index($id = '')
	{

		$this->load->model('proposition');

		$this->load->view('header');

		if($id != '') {

			$proposition = $this->proposition->get_proposition($id);

			$this->load->view('soutenir_proposition', array(
				'proposition' => $proposition
			));


		} else {

			$propositions = $this->proposition->get_propositions(true);

			$this->load->view('soutenir_acceuil', array(
				"propositions" => $propositions
			));

		}

		$this->load->view('footer');
	}


	public function proposition($id = '', $pour_contre = '')
	{
		if($this->input->post('email') != null && $this->input->post('email') != ''){

			// On a donné son email et on souhaite être pour/contre cette proposition.

			$this->load->model('proposition');
			$proposition = $this->proposition->pour($id, $this->input->post('pseudo'));


		} else {

			// Message pour obtenir l'email avant de continuer.

			$this->load->view('header');



				$this->load->view('soutenir_proposition', array(
					'proposition' => $proposition
				));

			$this->load->view('footer');


		}



	}


}
