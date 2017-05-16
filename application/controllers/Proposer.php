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

			$this->load->view('proposer');

		$this->load->view('footer');
	}

	public function propose()
	{

		if($this->input->post('pseudo') != null && $this->input->post('email') != null){

			// On a au moins des coordonnés, on continue...
			// On part également du principe que toutes les inputs du formulaire
			// existent et sont != null .

			$this->load->model('proposition');

			$proposition = array(
				"auteur_pseudo" => $this->input->post('pseudo'),
				"auteur_email" => $this->input->post('email'),

				"titre" => $this->input->post('titre'),
				"mots_cles" => $this->input->post('mots'),
				"contenu" => $this->input->post('contenu')
			);

			$ok = $this->proposition->ajouter_propositon($proposition);

			if($ok == false){

				// Une erreur s'est produite, on affiche une page d'erreur à l'utiliseur.

				$this->load->view('header');
					$this->load->view('proposer_erreur');
				$this->load->view('footer');

			} else {

				// La proposition a bien été ajoutée -> $ok = id de la proposition.

				// On envoie un email de confirmation.

				$config_email = Array(
			 		'mailtype'  => 'html',
			 		'charset'   => 'utf-8'
			 	);

			 	$this->load->library('email', $config_email);

				$this->email->from('moderateurs@lappel-presse.fr', 'Modérateurs de la Plateforme Consitutante');
				$this->email->to($proposition['auteur_email']);

				$this->email->subject('Merci de votre participation !');

				$body = $this->load->view('email_confirmation_proposition', array(
					'auteur_pseudo' => $proposition['auteur_pseudo'],
					'titre' => $proposition['titre'],
					'confirm_url' => base_url('proposer/confirm/'.$ok)
				), true);

				$this->email->message($body);

				$this->email->send();

				//On affiche une page de succès à l'utilisateur.

				$this->load->view('header');
					$this->load->view('proposer_succes');
				$this->load->view('footer');


			}

		}

	}


	public function confirm($id = ''){

		if($id != null && $id != ''){

			$this->load->model('proposition');

			$this->load->view('header');
				$this->load->view('msg_confirmation_email');
			$this->load->view('footer');

		}


	}


}
