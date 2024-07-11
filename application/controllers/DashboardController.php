<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This class contains all the methods related to products fucntion
 * 
 * @author Castro
 * 
 */
class DashboardController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('ProductModel');
    $this->load->library('form_validation');
  }


  /**
   * This method is used to display admin panel of all the products.
   * But the view file cannot be accessible without getting logged in
   * 
   */
  public function index()
  {
    if($this->session->userdata('validated') == true) {
      $data['products'] = $this->ProductModel->get_all_product_details();
      
      $this->load->view('layouts/header');
      $this->load->view('home/dashboard', $data);
      $this->load->view('layouts/footer');
    }
    else {
      redirect('login');
    }
  }


  /**
   * This method is used to delete a product
   * 
   * @param id product_id
   */
  public function delete_product($id)
  {
    $product_id = $id;

    $deleted_product = $this->ProductModel->delete_product($product_id);

    if($deleted_product) {
      $this->session->set_flashdata('success_message', 'Product deleted successfully');
      redirect('dashboard');
    }
    else {
      $this->session->set_flashdata('error_message', 'Product not deleted successfully');
      redirect('dashboard');
    }
  }


  /**
   * This method is used to navigate to edit product page with that product details
   * 
   * @param id product_id
   * 
   */
  public function edit_product($id)
  {
    $data['product_detail'] = $this->ProductModel->get_product_detail($id);

    $this->load->view('layouts/header');
    $this->load->view('home/edit_product', $data);
    $this->load->view('layouts/footer');
  }


  /**
   * This method is used to update the changes made product
   * 
   * @param id product_id
   * @param name
   * @param description
   * @param price
   * 
   */
  public function update_product($id)
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required|numeric');

    if ($this->form_validation->run() === FALSE) {
      $data['product_detail'] = $this->ProductModel->get_product_detail($id);

      $this->load->view('layouts/header');
      $this->load->view('home/edit_product', $data);
      $this->load->view('layouts/footer');
    } 
    else {
      $name = $this->input->post('name');
      $description = $this->input->post('description');
      $price = $this->input->post('price');

      $updated_product = $this->ProductModel->update_product($id, $name, $description, $price);

      if ($updated_product) {
        $this->session->set_flashdata('success_message', 'Product updated successfully');
        redirect('dashboard');
      } 
      else {
        $this->session->set_flashdata('error_message', 'Product not updated successfully');
        redirect('dashboard');
      }
    }
  }


  /**
   * This method is used to route to create product page
   * 
   */
  public function create_product()
  {
    $this->load->view('layouts/header');
    $this->load->view('home/create_product');
    $this->load->view('layouts/footer');
  }


  /**
   * This method is used to store new product into the database.
   * 
   * @param name
   * @param description
   * @param price
   * 
   */
  public function store_product()
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required|numeric');

    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header');
      $this->load->view('home/create_product');
      $this->load->view('layouts/footer');
    } 
    else {
      $name = $this->input->post('name');
      $description = $this->input->post('description');
      $price = $this->input->post('price');

      $created_product = $this->ProductModel->create_new_product($name, $description, $price);

      if ($created_product) {
        $this->session->set_flashdata('success_message', 'Product created successfully');
        redirect('product/store');
      } 
      else {
        $this->session->set_flashdata('error_message', 'Product not created successfully');
        redirect('product/store');
      }
    }
  }

}