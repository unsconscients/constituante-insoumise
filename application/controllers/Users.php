<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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


  public function login()
  {

    if($this->input->post('email') != null && $this->input->post('password') != null ){
      // Envoi d'un formulaire de connexion !

      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $this->load->model('user');
      $ok = $this->user->login($email, $password);

			if($ok){
				redirect();
			} else {
				redirect("/users/login?erreur=Email ou Mot de passe Incorrect ! Ou bien votre adresse email n'est pas encore validée (consultez votre boite mail).");
			}


    } else {

      // On affiche la page de connexion

      $erreur = '';
      if($this->input->get('erreur') != null){
        $erreur = $this->input->get('erreur') ;
      }

      $this->load->view('header');

  			$this->load->view('users/login', array('erreur' => $erreur));

  		$this->load->view('footer');

    }

  }


  public function logout()
  {

    $this->load->model('user');
    $this->user->logout();

  }



  public function signup(){


    if($this->input->post('pseudo') != null && $this->input->post('email') != null && $this->input->post('password') != null)
    {
      // Un utilisateur cherche à créer un compte.

      $data = array(
        'nom' => $this->input->post('nom'),
        'prenom' => $this->input->post('prenom'),
        'ville' => $this->input->post('ville'),
        'code_postal' => $this->input->post('code_postal')
        // Ajouter d'autres
      );

      $this->load->model('user');
      $ok = $this->user->signup(
        $this->input->post('pseudo'),
        $this->input->post('email'),
        $this->input->post('password'),
        $data
      );

      if($ok){
        redirect('/msg/signup');
      } else {
        redirect('/users/signup?erreur=Erreur ! Cette adresse Email existe déjà !');
      }


    } else {

      // On affiche la page de création de compte.

      $erreur = '';
      if($this->input->get('erreur') != null){
        $erreur = $this->input->get('erreur') ;
      }

      $this->load->view('header');
        $this->load->view('users/signup', array('erreur' => $erreur));
      $this->load->view('footer');
    }

  }


  public function confirm($md5_id = '')
  {

    $this->load->model('user');
    $this->user->confirm($md5_id);

    redirect('/users/login');

  }


}
