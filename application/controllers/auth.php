<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('Form_model');
$this->load->model('mcq_model');
$this->load->library(array('form_validation','session'));
$this->load->helper(array('url','html','form'));
$this->user_id = $this->session->userdata('user_id');
}
public function index()
{
   $this->load->view('login');
}
public function register(){
	$this->load->view('register');
}
public function post_login()
{
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
$this->form_validation->set_message('required', 'Enter %s');
if ($this->form_validation->run() === FALSE)
{  
$this->load->view('login');
}
else
{   
$data = array(
'email' => $this->input->post('email'),
'password' => md5($this->input->post('password')),
);
$check = $this->Form_model->auth_check($data);
if($check != false){
$user = array(
'user_id' => $check->id,
'email' => $check->email,
'firstname' => $check->firstname,
'lastname' => $check->lastname,
'user_type'=> $check->user_type,
);
$this->session->set_userdata($user);
if($check->user_type =='guest'){
	redirect( base_url('index.php') ); 
}
redirect( base_url('index.php/auth/dashboard') ); 
}
$this->load->view('login');
}
}   
public function post_register()
{
$this->form_validation->set_rules('first_name', 'First Name', 'required');
$this->form_validation->set_rules('last_name', 'Last Name', 'required');
$this->form_validation->set_rules('mobile', 'Mobile No', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('city', 'City', 'required');
$this->form_validation->set_rules('user_type', 'User Type', 'required');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
$this->form_validation->set_message('required', 'Enter %s');
if ($this->form_validation->run() === FALSE)
{  
$this->load->view('register');
}
else
{   
$data = array(
'firstname' => $this->input->post('first_name'),
'lastname' => $this->input->post('last_name'),
'mobile' => $this->input->post('mobile'),
'email' => $this->input->post('email'),
'city' => $this->input->post('city'),
'user_type'=> $this->input->post('user_type'),
'password' => md5($this->input->post('password')),
);
$check = $this->Form_model->insert_user($data);
if($check != false){
$user = array(
'user_id' => $check,
'email' => $this->input->post('email'),
'firstname' => $this->input->post('firstname'),
'lastname' => $this->input->post('lastname'),
'user_type' => $this->input->post('user_type'),

);
}
$this->session->set_userdata($user);
if($this->input->post('user_type') =='guest'){
	redirect( base_url('index.php') ); 
}
redirect( base_url('index.php/auth/dashboard') ); 
}
}

public function logout(){
$this->session->sess_destroy();
redirect(base_url('index.php/auth'));
}   

public function dashboard(){
if(empty($this->user_id)){
redirect(base_url('auth'));
}
$this->load->view('auth/dashboard');
}

public function candidates(){

	
	//print_r($data);die;
	$this->load->view('auth/users');
	}

	public function userslist(){

	

		$userData = $this->input->post();
		// echo "<pre>";
		// print_r($userData);die;
		// Get data
		$data = $this->mcq_model->getUsers($userData);
   
		echo json_encode($data);
		//print_r($data);die;
		
		}

}
