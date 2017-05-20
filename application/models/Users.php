<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Users extends CI_Model {


  public function __construct()
  {
    $this->load->database();
  }


  public function login($email, $password)
  {

    try
    {
      $sql = 'SELECT id, pseudo, email FROM users WHERE email = ? AND password = ? AND confirm = 1';

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

      } else {

        $sql = "INSERT INTO users (pseudo, email, passowrd, nom, prenom, adresse, ville, code_postal) VALUES (?,?,?,?,?,?,?,?)";

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

        $ok = true;

      }

    }
    catch( Exception $e )
    {
      $ok = false;
    }

    return $ok;
  }


}

?>
