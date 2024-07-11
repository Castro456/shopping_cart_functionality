<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class model contains methods related to register
 * 
 * @author Castro
 */
class RegisterModel extends CI_Model
{
  public function __construct() 
  {
    parent::__construct();
    $this->load->database();
  }


  /**
   * This method is used to create a new user
   * 
   * @param name
   * @param email
   * @param phone
   * @param password
   * 
   * @return boolean
   */
  public function create_user($name, $email, $phone, $password)
  {
    $data = array(
      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'password' => $password
    );

    $result = $this->db->insert('users', $data);
    return $result;
  }
}