<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This class contains methods related to Cart
 * 
 * @author Castro
 * 
 */
class CartController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('cart');
    $this->load->model('ProductModel');
  }


  /**
   * This method is used to load products and cart contents in to cart view page.
   * 
   */
  public function index()
  {
    $data['products'] = $this->ProductModel->get_all_product_details();
    $data['cart'] = $this->cart->contents();

    $this->load->view('layouts/header');
    $this->load->view('cart/cart', $data);
    $this->load->view('layouts/footer');
  }


  /**
   * This method is used to add products into the cart.
   * 
   * If the product already exists in the cart in will be updated automatically
   * 
   */
  public function add($id)
  {
    $product = $this->ProductModel->get_product_detail($id);
    $data = array(
      'id'   => $product['product_id'],
      'qty'  => 1,
      'price'=> $product['price'],
      'name' => $product['product_name']
    );

    $this->cart->insert($data);
    redirect('cart');
  }


  /**
   * This method is used to remove a specific products from the cart.
   * 
   */
  public function remove($rowid)
  {
    $data = array(
      'rowid' => $rowid,
      'qty'   => 0
    );

    $this->cart->update($data);
    redirect('cart');
  }


  /**
   * This method is used to empty the cart completely including all added products.
   * 
   */
  public function clear()
  {
    $this->cart->destroy();
    redirect('cart');
  }


  /**
   * Used to update the products quantity in the cart
   * 
   */
  public function update()
  {
    $cart_data = array();
    
    // Loop through POST data to get no.of cart items added
    foreach ($this->input->post() as $key => $value) {
      if (strpos($key, 'qty_') !== false) {
        $rowid = str_replace('qty_', '', $key);
        $qty = $value;
        
        $data = array(
          'rowid' => $rowid,
          'qty'   => $qty
        );
        $this->cart->update($data);
      }
    }

    redirect('cart');
  }

}
