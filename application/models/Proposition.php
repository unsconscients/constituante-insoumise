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

        $ok = true;

      }
      catch( Exception $e )
      {
        $ok = false;
      }

      return $ok;

    }



    public function get_propositions()
    {

      $propositions = array();

      try
      {
        $sql = 'SELECT * FROM propositions WHERE valide = 1';

        $query = $this->db->query($sql);
        foreach($query->result() as $ligne){

          $proposition = array(
            "id" => $ligne->id,
            "_id" => $ligne->_id,
            "auteur_pseudo" => $ligne->auteur_pseudo,
            "auteur_email" => $ligne->auteur_email,
            "gravatar_hash" => md5('mullermarc67240@gmail.com'), // md5($ligne->auteur_email),

            "titre" => $ligne->titre,
            "mots_cles" => $ligne->mots_cles,
            "contenu" => $ligne->contenu,
            "_date" => $ligne->_date
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
        $sql = 'SELECT * FROM propositions WHERE valide = 1 && id = ?';

        $query = $this->db->query($sql, array($id));

        if($query->num_rows() == 1){
          $proposition = array(
            "id" => $query->row()->id,
            "_id" => $query->row()->_id,
            "auteur_pseudo" => $query->row()->auteur_pseudo,
            "auteur_email" => $query->row()->auteur_email,
            "gravatar_hash" => md5('mullermarc67240@gmail.com'), // md5($ligne->auteur_email),

            "titre" => $query->row()->titre,
            "mots_cles" => $query->row()->mots_cles,
            "contenu" => $query->row()->contenu,
            "_date" => $query->row()->_date,
            "aime" => $query->row()->aime,
            "aime_pas" => $query->row()->aime_pas
          );
        }

      }
      catch( Exception $e ) { }

      return $proposition;

    }

}

?>
