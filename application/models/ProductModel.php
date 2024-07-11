<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class model contains methods related to Product table
 * 
 * @author Castro
 * 
 */
class ProductModel extends CI_Model
{
  public function __construct() 
  {
    parent::__construct();
    $this->load->database();
  }


  /**
   * This method is used to get all the product details for the admin dashboard page.
   * 
   * @return array
   */
  public function get_all_product_details()
  {
    $this->db->select('id product_id, name product_name, description, price, created_at');
    $this->db->from('products');

    return $this->db->get()->result_array();
  }


  /**
   * This method is used to delete a product
   * 
   * @param product_id
   * 
   * @return boolean
   */
  public function delete_product($product_id)
  {
    $data = array(
      'id' => $product_id
    );

    return $this->db->delete('products', $data);
  }


  /**
   * This method is used to update a product
   * 
   * @param product_id
   * @param name
   * @param description
   * @param price
   * 
   * @return boolean
   */
  public function update_product($product_id, $name, $description, $price)
  {
    $data = array(
      'name' => $name,
      'description' => $description,
      'price' => $price
    );
    $this->db->where('id', $product_id);

    return $this->db->update('products', $data);
  }


  /**
   * This method is used to create a product
   * 
   * @param product_id
   * @param name
   * @param description
   * @param price
   * 
   * @return boolean
   */
  public function create_new_product($name, $description, $price)
  {
    $data = array(
      'name' => $name,
      'description' => $description,
      'price' => $price,
      'created_at' => date('Y-m-d H:i:s')
    );

    return $this->db->insert('products', $data);
  }


  /**
   * This method is used to get product detail for the cart page.
   * 
   * @param $product_id
   * 
   * @return array
   */
  public function get_product_detail($product_id)
  {
    $this->db->select('id product_id, name product_name, description, price, created_at');
    $this->db->from('products');
    $this->db->where('id', $product_id);

    return $this->db->get()->row_array();
  }
}