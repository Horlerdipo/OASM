<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Greetings extends CI_Controller{

	public function index($data='stranger'){
			# code...
		$data = array('name' =>$data );
		$this->load->view('greetings',$data);
		//echo "<b>heyy people<";
		
	}





}








?>