<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Proposition extends CI_Model {


    public function __construct()
    {
      $this->load->database();
    }


    public function ajouter_propositon($array)
    {

      $ok = false;

      try
      {
        $sql = 'INSERT INTO propositions (auteur_pseudo, auteur_email, titre, mots_cles, contenu, _date ) VALUES (?,?,?,?,?, now() )';

        $this->db->query($sql, array(
          $array['auteur_pseudo'],
          $array['auteur_email'],

          $array['titre'],
          $array['mots_cles'],
          $array['contenu']
        ));

        $ok = $this->db->insert_id();

      }
      catch( Exception $e )
      {
        $ok = false;
      }

      return $ok;

    }


    // Si $autorisation == false on montre TOUTES les proposition (admin)
    // Sinon on ne montre que les autorisées par les modérateurs.
    public function get_propositions($autorisation)
    {

      $propositions = array();

      // Conversion de boolean en integer (on ne sait jamais !)
      $aut = 0;
      if($autorisation){
        $aut = 1;
      }

      try
      {
        if($aut == 1) {
          $sql = 'SELECT * FROM propositions WHERE autorisation = 1';
        } else {
          $sql = 'SELECT * FROM propositions';
        }


        $query = $this->db->query($sql);
        foreach($query->result() as $ligne){

          $proposition = array(
            "id" => $ligne->id,
            "_id" => $ligne->_id,
            "auteur_pseudo" => $ligne->auteur_pseudo,
            "auteur_email" => $ligne->auteur_email,
            "gravatar_hash" => md5($ligne->auteur_email),

            "titre" => $ligne->titre,
            "mots_cles" => $ligne->mots_cles,
            "contenu" => $ligne->contenu,
            "_date" => $ligne->_date,
            "pour" => $ligne->pour,
            "contre" => $ligne->contre,

            "confirmation" => $ligne->confirmation,
            "date_confirmation" => $ligne->date_confirmation,
            "autorisation" => $ligne->autorisation,
            "date_autorisation" => $ligne->date_autorisation
          );

          $propositions[] = $proposition;
        }

      }
      catch( Exception $e ) { }

      return $propositions;

    }



    public function get_proposition($id)
    {

      $proposition = array();

      try
      {
        $sql = 'SELECT * FROM propositions WHERE id = ?';

        $query = $this->db->query($sql, array($id));

        if($query->num_rows() == 1){
          $proposition = array(
            "id" => $query->row()->id,
            "_id" => $query->row()->_id,
            "auteur_pseudo" => $query->row()->auteur_pseudo,
            "auteur_email" => $query->row()->auteur_email,
            "gravatar_hash" => md5($query->row()->auteur_email),

            "titre" => $query->row()->titre,
            "mots_cles" => $query->row()->mots_cles,
            "contenu" => $query->row()->contenu,
            "_date" => $query->row()->_date,

            "confirmation" => $query->row()->confirmation,
            "date_confirmation" => $query->row()->date_confirmation,
            "autorisation" => $query->row()->autorisation,
            "date_autorisation" => $query->row()->date_autorisation
          );
        }


        // On cherche le nombre de pour et contre.
        $sql = "SELECT sum(pour) as pour, sum(contre) as contre FROM votes_propositions WHERE id_proposition = ?";
        $query = $this->db->query($sql, array($id));
        if($query->num_rows() == 1){
          $proposition['pour'] = intval($query->row()->pour);
          $proposition['contre'] = intval($query->row()->contre);
        }

        // Si l'utilisateur est connecté, on cherche ce qu'il a voté.
        if($this->session->userdata('logged') != null){

          $proposition['vote_user_pour'] = 0;
          $proposition['vote_user_contre'] = 0;

          $sql = "SELECT pour, contre FROM votes_propositions WHERE id_proposition = ? AND id_user = ?";
          $query = $this->db->query($sql, array(
            intval($id),
            intval($this->session->userdata('logged')['id'])
          ));
          if($query->num_rows() == 1){

            $proposition['vote_user_pour'] = $query->row()->pour;
            $proposition['vote_user_contre'] = $query->row()->contre;

          }
        }


      }
      catch( Exception $e ) { }

      return $proposition;

    }


    public function pour_contre($id, $pour_contre)
    {
      $sql = 'SELECT id FROM votes_propositions WHERE id_proposition = ? AND id_user = ?';
      $query = $this->db->query($sql, array(
        $id,
        intval($this->session->userdata('logged')['id'])
      ));

      if($query->num_rows() > 0){
        // Cet utilisateur a déjà voté

      } else {

        if($pour_contre == 'pour'){
          $sql = "INSERT INTO votes_propositions (id_proposition, id_user, pour, contre) VALUES (?,?,1,0)";
        } else if($pour_contre == 'contre'){
          $sql = "INSERT INTO votes_propositions (id_proposition, id_user, pour, contre) VALUES (?,?,0,1)";
        }

        $this->db->query($sql, array(
          $id,
          intval($this->session->userdata('logged')['id'])
        ));

      }


    }



    public function confirmer($id)
    {
      $sql = "UPDATE propositions SET confirmation = 1, date_confirmation = now() WHERE id = ?";
      $this->db->query($sql, array($id));
    }


    public function autorise($id, $autorise)
    {
      $sql = "UPDATE propositions SET autorisation = ?, date_autorisation = now() WHERE id = ?";
      $this->db->query($sql, array($autorise, $id));
    }


    public function supprimer($id)
    {
      $sql = "DELETE FROM propositions WHERE id = ?";
      $this->db->query($sql, array($id));
    }




}

?>
