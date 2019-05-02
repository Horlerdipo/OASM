<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{



	public function signin(){
		if ($this->session->logged_in) {
			# code...
			echo "you fucker";
		}else{
			$data['title']="login page";
			$data['error']=NULL;
			$this->load->view("login_view",$data);

		}
	}

	public function register(){

		if ($this->session->logged_in) {
			# code...
			echo "you mofucker";
		}else{

		$data['title']="Register";
		$data['error']=NULL;
		$this->load->view("register_view",$data);
		
		}

		

	}


	public function login(){

		$this->form_validation->set_rules('username',' Username','required|min_length[5]');

		$this->form_validation->set_rules('password',' Password','required');

		$this->form_validation->set_rules('email',' Email','required|valid_email');

		if($this->session->logged_in==TRUE){

			echo "you must have logged in already";
		}else{
		
		if ($this->form_validation->run()==FALSE) {
			
			$data['title']="Login Page";
			$data['error']=validation_errors();
			//$this->load->view("login_view",$data);
			redirect('/users/signin');
			

		}else{

			 $password=xss_clean($this->input->post("password"));
			 $username=xss_clean($this->input->post("username"));
			 $email=xss_clean($this->input->post("email"));

			// echo $username;

			$return=$this->user_model->login_user($username,$email,$password);
			//echo $return;
			if($return==NULL){
				$data['error']="invalid email/username";
				//$this->load->view('login_view',$data);]
				redirect('/users/sigin');

			}else{

				$user_data=[

					'username'=>$username,
					'email'=>$email,
					'logged_in'=>TRUE
				];

				$this->session->set_userdata($user_data);
				
				//$this->load->view('students_view');
				//echo "you are logged in";
				redirect('/student');

			}

		}
	}



}





	public function signup(){

		if ($this->session->logged_in) {
			
			echo "you are already logged in";		
	}else{

		$this->form_validation->set_rules('matric_no','Matric No/Staff ID','required|min_length[5]');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[3]');
		$this->form_validation->set_rules('confpassword','Confirm Password','required|matches[password]');
		$this->form_validation->set_rules('type','Type','required');

		if ($this->form_validation->run()==FALSE) {
			# code...
			//redirect('users/register');
			$data['title']="Register";
			$data['error']=validation_errors();
			$this->load->view("register_view",$data);
		


		}else{

			$username=xss_clean($this->input->post('matric_no'));
			$email=xss_clean($this->input->post('email'));
			$password=xss_clean($this->input->post('password'));
			$type=xss_clean($this->input->post('type'));

			$password=do_hash($password,'md5');
			

			$data=[

				'name'=>$username,
				'email'=>$email,
				'password'=>$password,
				'type'=>$type
			];

			$result=$this->user_model->check_user($username,$email);

				
			if ($result==FALSE) {
				# code...
				//echo "registered";
				$result=$this->user_model->register_user($data);

				if ($result) {
				# code...
					$user_data=[

					'username'=>$username,
					'email'=>$email,
					'logged_in'=>TRUE
				];

					$this->session->set_userdata($user_data);
					//echo "registered";
					redirect('/users/signin');

				}else{

				echo "not registered";

				}

			}else{

				echo "already exists in the database";

			}
		}
	}
}
}







?>