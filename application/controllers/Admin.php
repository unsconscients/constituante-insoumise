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

		// Avant de continuer, on vérifie si l'utilisateur est connecté et si il est modérateur
		if($this->session->userdata('logged') != null && $this->session->userdata('logged')['moderateur']){

			$page = $this->input->get('page');

			$this->load->model('proposition');
			$this->load->model('commentaire');

			$this->load->view('admin/header');

				if($page == 'propositions'){

					$propositions = $this->proposition->get_propositions(false);
					$this->load->view('admin/propositions/propositions', array('propositions' => $propositions));

				} else if ($page == 'commentaires') {

					$commentaires = $this->commentaire->get_all_commentaires();
					$this->load->view('admin/commentaires/commentaires', array('commentaires' => $commentaires));

				} else {
					redirect('/admin?page=propositions');
				}

			$this->load->view('admin/footer');

		} else {
			// On le redirige vers la page de connexion
			redirect('/users/login?erreur=Il faut avoir un compte de modérateur pour accédé à la page des modérateurs !');
		}

	}




 function propositions($action = '', $id = '')
	{

		$this->load->model('proposition');

		switch ($action) {
			case 'supprimer':

				$this->load->view('admin/header');
					$proposition = $this->proposition->get_proposition($id);
					$this->load->view('admin/propositions/supprimer_proposition', $proposition);
				$this->load->view('admin/footer');

				break;
				// break supprimer

			case 'supprime':

				$this->load->model('proposition');
				$this->proposition->supprimer($id);

				redirect('/admin?page=propositions');

				break;
				// break supprimer

			case 'autorise':

				$this->load->view('admin/header');

					if($this->input->get('autorise') != null && $this->input->get('autorise') != ''){

						if($this->input->get('autorise') == 'oui'){

							$this->proposition->autorise($id, 1);

							redirect('admin?page=propositions');

						} else if($this->input->get('autorise') == 'non'){

							$this->proposition->autorise($id, 0);

							redirect('admin?page=propositions');

						}


					} else {

						redirect('/admin?page=propositions');

					}

				$this->load->view('admin/footer');

				break;
				// break supprimer

			case 'autoriser':

				$this->load->view('admin/header');
					$this->load->view('admin/propositions/autoriser_proposition');
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
		$this->load->model('commentaire');

		switch ($action) {
			case 'supprimer':

				$this->load->view('admin/header');
					$commentaire = $this->commentaire->get_commentaire($id);
					$this->load->view('admin/commentaires/supprimer_commentaire', $commentaire);
				$this->load->view('admin/footer');

				break;
				// break supprimer

			case 'supprime':

				$this->commentaire->supprime($id);
				redirect('/admin?page=commentaires');

				break;
				// break supprimer

			case 'autorise':

				if($this->input->get('autorise') != null && $this->input->get('autorise') == 'oui' ){

					$this->commentaire->autorise($id, 1);
					redirect('/admin?page=commentaires');

				} else if ($this->input->get('autorise') != null && $this->input->get('autorise') == 'non' ){

					$this->commentaire->autorise($id, 0);
					redirect('/admin?page=commentaires');

				} else {
					redirect('/admin?page=commentaires');
				}

				break;

			case 'consulter':
				$this->load->view('admin/header');
					$commentaire = $this->commentaire->get_commentaire($id);
					$this->load->view('admin/commentaires/consulter_commentaire', $commentaire);
				$this->load->view('admin/footer');
				break;
		}


	}



}
