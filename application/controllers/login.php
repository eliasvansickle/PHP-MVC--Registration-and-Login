<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		////Load view file here////
		$this->load->view('home');
	}
	public function validate_register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name','Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('registration_errors', validation_errors());
			redirect('/');
		}
		else
		{
			$registration_data = $this->input->post();
			$this->load->model('validate');
			$this->validate->register($registration_data);
			$this->session->set_flashdata('registration_success', "Registration Successful");
			redirect('/');
		}
	}
	public function validate_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5|min_length[6]');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('login_errors', validation_errors());
			redirect('/');
		}
		else
		{	
			$this->load->model('validate');
			$login_data = $this->input->post();
			$user_info = $this->validate->login($login_data);

			if($user_info) 
			{
				$this->session->set_userdata('user_session', $user_info);
				$user = $this->session->userdata('user_session');
				
				$this->load->view('success', array(
					'user' => $user
					));
			}
			else
			{
				$this->session->set_flashdata('login_fail', 'Cannot locate a user with those credentials');
				redirect('/');
			}
		}
	}
	public function logoff()
	{
		$this->session->unset_userdata('user_session');
		$this->session->set_flashdata('logoff', 'You have successfully logged off');
		redirect('/');
	}
}

//end of main controller

