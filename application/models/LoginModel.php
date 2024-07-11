<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model
{
  public function __construct() 
  {
    parent::__construct();
    $this->load->database();
  }


  /**
   * This method is used to get user details of the logged in user.
   * For validation and also for setting up session data
   * 
   * @param $email
   * 
   * return array
   */
  public function get_user_details($email)
  {
    $this->db->select('name, email, phone, password');
    $this->db->from('users');
    $this->db->where('email', $email);

    return $this->db->get()->row_array();
  }
}