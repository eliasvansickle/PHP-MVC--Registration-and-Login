<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function register($registration_data)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) 
				  VALUES (?, ?, ?, ?, NOW(), NOW())";

		$values = array(
			"{$registration_data['first_name']}",
			"{$registration_data['last_name']}",
			"{$registration_data['email']}",
			"{$registration_data['password']}"
			);
		$this->db->query($query, $values);
	}
	public function login($login_data)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array(
			$login_data['email'],
			$login_data['password']
			);
		return $this->db->query($query, $values)->row_array();
	}
}
?>