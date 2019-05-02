<?php


class question_model extends CI_Model{

    public function __construct(){

        parent::__construct();

        if($this->session->logged_in){

            return FALSE;
            die();

        }

    }


    public function get_question(){

        $query=$this->db->get('questions');
        $result=$query->result();

        if(empty(result)){

            return FALSE;

        }else{

            return $result;

        }

    }


}





?>