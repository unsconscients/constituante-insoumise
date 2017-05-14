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








}

?>
