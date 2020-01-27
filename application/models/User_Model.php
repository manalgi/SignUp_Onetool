<?php
   Class User_model extends CI_Model {

      Public function __construct() {
         parent::__construct();
      }

      public function insert($data) {
        if ($this->db->insert("users", $data)) {
           return true; 
        }
     }


   }
?>
