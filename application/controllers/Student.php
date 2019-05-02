<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Student extends CI_Controller{


    public function __construct(){

        parent::__construct();

        if($this->session->logged_in==FALSE){

            redirect('/users/signin');

        }

    }
    
        

    public function show_questions(){

        if($this->session->logged_in==FALSE){

            redirect('/users/signin');

        }else{

            //echo('this is the questoiom');
            $result=$this->question_model->get_question();
            if(empty($result)){

                $this->load->view();

            }
        }
    }


    public function index(){

        if($this->session->logged_in==FALSE){

            redirect('/users/signin');

        }else{

            $this->load->view('students_view');
        

        }

    }

}


?>