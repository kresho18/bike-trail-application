<?php

class User_authentication extends CI_Controller {

    public function __construct() {

		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_database');

    }

    public function index() {

		$this->load->view('user_authentication/login_form');
		$this->load->view('templates/footer');
    
	}
	
	public function show() {

		$this->load->view('user_authentication/registration_form');
		$this->load->view('templates/footer');
	
	}

    public function signin() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$result = $this->login_database->login($data);
		if ($result == TRUE) {

			$username = $this->input->post('username');
			$result = $this->login_database->read_user_information($username);
			if ($result != false) {

				$session_data = array(
					'username' => $result[0]->user_name,
					'email' => $result[0]->user_email,
				);
				$data = array('error_message' => 'Signin OK');
				$this->session->set_userdata('logged_in', $session_data);
				$this->load->view('user_authentication/login_form',$data);
				$this->load->view('templates/footer');
			
			}

		} else {

			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
			$this->load->view('user_authentication/login_form', $data);
			$this->load->view('templates/footer');
		
		}
	
	}

	public function signup() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
	
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('user_authentication/registration_form');

		} else {
			
			$data = array(
				'user_name' => $this->input->post('username'),
				'user_email' => $this->input->post('email_value'),
				'user_password' => $this->input->post('password')
			);
			
			$result = $this->login_database->registration_insert($data);

			if ($result == TRUE) {

				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('user_authentication/login_form', $data);
				$this->load->view('templates/footer');
				
			} else {

				$this->load->view('user_authentication/registration_form');
				$this->load->view('templates/footer');
				
			}
		
		}
	
	}

}