<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Model {


  public function __construct()
  {
    $this->load->database();
  }


  public function login($email, $password)
  {

    try
    {
      $sql = 'SELECT id, _id, pseudo, email FROM users WHERE email = ? AND password = ? AND confirm = 1';

      $query = $this->db->query($sql, array($email, md5($password)));
      if($query->num_rows() > 0){
        // On a trouvé un utilisateur.

        $this->session->set_userdata('logged' , array(
          "id" => $query->row()->id,
          "_id" => $query->row()->_id,
          "pseudo" => $query->row()->pseudo,
          "email" => $quer->row()->email
        ));

      }


    }
    catch( Exception $e ) { }

  }


  public function logout()
  {
    // On supprime la session CodeIgniter
    $this->session->sess_destroy();

    redirect();
  }


  public function signup($pseudo, $email, $password, $data)
  {
    $ok = false;

    try
    {

      $sql = "SELECT email FROM users WHERE email = ?";

      $query = $this->db->query($sql, array($email));

      if($query->num_rows() > 0){
        $ok = false;
      } else {
        $sql = "INSERT INTO users (pseudo, email, password, nom, prenom, adresse, ville, code_postal, _date) VALUES (?,?,?,?,?,?,?,?, now())";

        $this->db->query($sql, array(
          $pseudo,
          $email,
          md5($password),
          $data['nom'],
          $data['prenom'],
          $data['adresse'],
          $data['ville'],
          $data['code_postal']
          // Ajouter d'autres...
        ));

        $newId = $this->db->insert_id();


        $config_email = Array(
			 		'mailtype'  => 'html',
			 		'charset'   => 'utf-8'
			 	);

        $this->load->library('email', $config_email);

				$this->email->from('accounts@lappel-presse.fr', 'Plateforme Constituante Insoumise');
				$this->email->to($email);

				$this->email->subject('Confirmez votre adresse email');

				$body = $this->load->view('emails/confirmer_email', array(
					'auteur_pseudo' => $pseudo,
					'confirm_url' => base_url('users/confirm/'.$newId.'?email='.$email)
				), true);

				$this->email->message($body);

				$this->email->send();


        $ok = true;
      }

    }
    catch( Exception $e )
    {
      $ok = false;
    }

    return $ok;
  }


  public function confirm($id = '', $email = '')
  {
    if($id != '' && $email != ''){

      try
      {
        $sql = "UPDATE users SET confirm = 1 WHERE id = ? AND email = ?";
        $this->db->query($sql, array($id, $email));

        redirect('/users/login');

      } catch (Exception $e){

      }

    }
  }


}

?>
