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
            "pour" => $query->row()->pour,
            "contre" => $query->row()->contre,

            "confirmation" => $query->row()->confirmation,
            "date_confirmation" => $query->row()->date_confirmation,
            "autorisation" => $query->row()->autorisation,
            "date_autorisation" => $query->row()->date_autorisation
          );
        }

      }
      catch( Exception $e ) { }

      return $proposition;

    }



    public function confirmer($id)
    {
      $sql = "UPDATE propositions SET confirmation = 1, date_confirmation = now() WHERE id = ?";
      $this->db->query($sql, array($id));
    }


    public function autorise($id)
    {
      $sql = "UPDATE propositions SET autorisation = 1, date_autorisation = now() WHERE id = ?";
      $this->db->query($sql, array($id));
    }




}

?>
