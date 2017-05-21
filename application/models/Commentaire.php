<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Commentaire extends CI_Model {


    public function __construct()
    {
      $this->load->database();
    }


    public function ajouter($id_proposition, $id_user, $pseudo, $email, $contenu)
    {


      try
      {
        $sql = 'INSERT INTO commentaires (id_proposition, id_user, pseudo, email, contenu, _date ) VALUES (?,?,?,?,?, now() )';

        $this->db->query($sql, array(
          $id_proposition,
          $id_user,
          $pseudo,
          $email,
          $contenu
        ));



      }
      catch( Exception $e )
      {

      }

    }


    public function get_all_commentaires(){

      $commentaires = array();

      try
      {

        $sql = 'SELECT id, id_user, pseudo, email, contenu, _date, autorisation, date_autorisation, (SELECT titre FROM propositions WHERE id = id_proposition) as proposition FROM commentaires ORDER BY _date';

        $query = $this->db->query($sql);

        foreach($query->result() as $ligne){

          $commentaire = array(
            "id" => $ligne->id,
            "id_user" => $ligne->id_user,
            "proposition" => $ligne->proposition,
            "pseudo" => $ligne->pseudo,
            "email" => $ligne->email,
            "gravatar_hash" => md5($ligne->email),
            "contenu" => $ligne->contenu,
            "_date" => $ligne->_date,
            "autorisation" => $ligne->autorisation,
            "date_autorisation" => $ligne->date_autorisation
          );

          $commentaires[] = $commentaire;

        }

      }
      catch( Exception $e )
      {

      }

      return $commentaires;

    }



    public function get_commentaire($id){

      $commentaire = array();

      try
      {

        $sql = 'SELECT id, id_user, pseudo, email, contenu, _date, autorisation, date_autorisation FROM commentaires WHERE id = ? ORDER BY _date';

        $query = $this->db->query($sql, array($id));

        if($query->num_rows() == 1){

          $commentaire = array(
            "id" => $query->row()->id,
            "id_user" => $query->row()->id_user,
            "pseudo" => $query->row()->pseudo,
            "email" => $query->row()->email,
            "gravatar_hash" => md5($query->row()->email),
            "contenu" => $query->row()->contenu,
            "_date" => $query->row()->_date,
            "autorisation" => $query->row()->autorisation,
            "date_autorisation" => $query->row()->date_autorisation
          );

        }

      }
      catch( Exception $e )
      {

      }

      return $commentaire;

    }


    public function get_commentaires($id_proposition){

      $commentaires = array();

      $sql = 'SELECT id, id_user, pseudo, email, contenu, _date FROM commentaires WHERE autorisation = 1 AND id_proposition = ? ORDER BY _date';

      $query = $this->db->query($sql, array($id_proposition));

      foreach($query->result() as $ligne){

        $commentaire = array(
          "id" => $ligne->id,
          "id_user" => $ligne->id_user,
          "pseudo" => $ligne->pseudo,
          "email" => $ligne->email,
          "gravatar_hash" => md5($ligne->email),
          "contenu" => $ligne->contenu,
          "_date" => $ligne->_date
        );

        $commentaires[] = $commentaire;

      }

      return $commentaires;

    }


    public function autorise($id, $autorise)
    {
      $sql = "UPDATE commentaires SET autorisation = ?, date_autorisation = now() WHERE id = ?";
      $this->db->query($sql, array($autorise, $id));
    }

}

?>
