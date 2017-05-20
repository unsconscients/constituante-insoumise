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
				$this->load->view('admin/propositions/propositions', array('propositions' => $propositions));

			} else if ($page == 'commentaires'){

				$this->load->view('admin/commentaires/commentaires');

			}

		$this->load->view('footer_admin');
	}




 function propositions($action = '', $id = '')
	{

		$this->load->model('proposition');

		switch ($action) {
			case 'supprimer':

				$this->load->view('header_admin');
					$this->load->view('admin/propositions/supprimer_proposition');
				$this->load->view('footer_admin');

				break;
				// break supprimer

			case 'supprime':

				$this->load->view('header_admin');
					$this->load->view('admin/propositions/supprime_proposition');
				$this->load->view('footer_admin');

				break;
				// break supprimer

			case 'autorise':

				$this->load->view('header_admin');

					if($this->input->get('autorise') != null && $this->input->get('autorise') != ''){

						if($this->input->get('autorise') == 'oui'){

							$this->proposition->autorise($id, 1);

						} else if($this->input->get('autorise') == 'non'){

							$this->proposition->autorise($id, 0);

						}

					} else {

						$this->load->view('admin_autoriser_proposition', array(
							'id' => $id,
							'oui_non' => $this->input->get('autorise')
						));

						redirect('admin');

					}

				$this->load->view('footer_admin');

				break;
				// break supprimer

			case 'autoriser':

				$this->load->view('admin/header');
					$this->load->view('admin/autoriser_proposition');
				$this->load->view('admin/footer');

				break;

			case 'consulter':
				$this->load->view('admin/header');

					$proposition = $this->proposition->get_proposition($id);

					$this->load->view('admin/propositions/consulter_proposition', $proposition);

				$this->load->view('admin/footer');
				break;
		}


	}



	public function commentaires($action, $id)
	{
		switch ($action) {
			case 'supprimer':

				$this->load->view('header_admin');
					$this->load->view('admin_supprimer_commentaire');
				$this->load->view('footer_admin');

				break;
				// break supprimer

			case 'supprime':

				$this->load->view('header_admin');
					$this->load->view('admin_supprime_commentaire');
				$this->load->view('footer_admin');

				break;
				// break supprimer

			case 'autoriser':

				$this->load->view('header_admin');
					$this->load->view('admin_autoriser_commentaire');
				$this->load->view('footer_admin');

				break;
				// break supprimer

			case 'autorise':

				$this->load->view('header_admin');
					$this->load->view('admin_autorise_commentaire');
				$this->load->view('footer_admin');

				break;

			case 'consulter':
				$this->load->view('header_admin');
					$this->load->view('admin_consulter_commentaire');
				$this->load->view('footer_admin');
				break;
		}


	}



}
