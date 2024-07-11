<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This class contains methods related to login
 * 
 * @author Castro
 */
class LoginController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('LoginModel');
  }

  
  /**
   * This method is used to load the login page.
   * If the user is already logged in then they must be routed back to dashboard page.
   * 
   */
  public function index()
  {
    if($this->session->userdata('validated') == true) {
      redirect('dashboard');
    }
    else {
      $this->load->view('layouts/header');
      $this->load->view('auth/login');
      $this->load->view('layouts/footer');
    }
  }


  /**
   * This method is used to validate the email and password given by the user.
   * If success redirect to dashboard.
   * If failed redirect to login page and throw the error.
   * 
   * @param email
   * @param password
   * 
   */
  public function authentication()
  {
    if ($this->input->post()) {

    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('layouts/header');
      $this->load->view('auth/login');
      $this->load->view('layouts/footer');
    }
    else {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $hash_password = md5($password);

      $get_user_data = $this->LoginModel->get_user_details($email);
      
      if(!empty($get_user_data)) {
        $db_password = $get_user_data['password'];

        if($hash_password === $db_password) { //compare the db password with the hashed input password.
          $session_data = array(
            'validated' => true,
            'name' => $get_user_data['name'],
            'email' => $get_user_data['email'],
            'phone' => $get_user_data['phone']
          );

          $this->session->set_userdata($session_data);
          redirect('dashboard');
        }
        else {
          //Used session flashdata to show the login message (success/failure).
          $this->session->set_flashdata('error_message', 'Username or Password is incorrect');
          redirect('login');
        }
      }
      else {
        $this->session->set_flashdata('error_message', 'Username or Password is incorrect');
        redirect('login');
      }

    }
  }
  }


  /**
   * This method is used to clear the session data and redirect the user to login page.
   * 
   */
  public function logout() {
    $this->session->sess_destroy();
    redirect('login');
  }
}