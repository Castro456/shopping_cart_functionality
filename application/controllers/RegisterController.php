<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This class contains methods related to Register page
 * 
 * @author Castro
 */
class RegisterController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->helper('email');
    $this->load->library('form_validation');
    $this->load->model('RegisterModel');
  }


  public function index()
  {
    if($this->session->userdata('validated') == true) {
      redirect('dashboard');
    }
    else {
      $this->load->view('layouts/header');
      $this->load->view('auth/register');
      $this->load->view('layouts/footer');
    }
  }


  /**
   * Insert a new user into the database records
   * 
   * @param name
   * @param email
   * @param phone
   * @param password
   * 
   */
  public function register_new_account()
  {
    if ($this->input->post()) {
    // Validate login form inputs
    $this->form_validation->set_rules('user_name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('layouts/header');
      $this->load->view('auth/register');
      $this->load->view('layouts/footer');
    }
    else {
      $name = $this->input->post('user_name');
      $email = $this->input->post('email');
      $phone = $this->input->post('phone');
      $password = $this->input->post('password');

      $password_hash  = md5($password); //hashing the password for further security.

      $register_user = $this->RegisterModel->create_user($name, $email, $phone, $password_hash);

      if($register_user) {
        $this->session->set_flashdata('success_message', 'Registration successful, Login now!');
        redirect('register');
      }
      else {
        $this->session->set_flashdata('error_message', 'Registration successful, Login now!');
        redirect('register');
      }
    }

  }
  }
}