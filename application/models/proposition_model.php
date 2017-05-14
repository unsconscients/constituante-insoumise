<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Proposition_model extends CI_Model {


    public function __construct()
    {

    }


    public function ajouter_propositon($array){

      $ok = false;

      try
      {
        $this->db->insert('propositions', $array);

        $ok = true;
      }
      catch( Exception $e )
      {
          $ok = false;
      }

      return $ok;

    }








}

?>
