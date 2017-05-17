<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

		$page = $this->input->get('page');

		$this->load->model('proposition');



		$this->load->view('header_admin');

			if($page == 'propositions'){

				$propositions = $this->proposition->get_propositions(false);
				$this->load->view('admin_propositions', array('propositions' => $propositions));

			} else if ($page == 'commentaires'){

				$this->load->view('admin_commentaires');

			}

		$this->load->view('footer_admin');
	}



	public function consulter($quoi, $id)
	{
		$this->load->view('header_admin');

			if($quoi == 'proposition'){

				$this->load->model('proposition');
				$proposition = $this->proposition->get_proposition($id);

				$this->load->view('consulter_proposition', $proposition);

			} else if($quoi == 'commentaire'){

			}

		$this->load->view('footer_admin');
	}


	public function autoriser($quoi, $id)
	{
		$this->load->view('header_admin');

			if($quoi == 'proposition'){

				$this->load->model('proposition');
				$proposition = $this->proposition->get_proposition($id);

				$this->load->view('autoriser_proposition', $proposition);

			} else if($quoi == 'commentaire'){

			}

		$this->load->view('footer_admin');
	}

	public function autorise($quoi, $id)
	{

		if($quoi == 'proposition'){

			$this->load->model('proposition');
			$this->proposition->autorise($id);

			redirect('admin?page=propositions');
		}

	}


	public function supprimer($quoi, $id)
	{
		$this->load->view('header_admin');

			if($quoi == 'proposition'){

				$this->load->model('proposition');
				$proposition = $this->proposition->get_proposition($id);

				$this->load->view('supprimer_proposition', $proposition);

			} else if($quoi == 'commentaire'){

			}

		$this->load->view('footer_admin');
	}



}
