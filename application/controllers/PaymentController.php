<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This class contains methods related to payment gateway
 * 
 * @author Castro
 * 
 */
class PaymentController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->model('ProductModel');
    $this->load->library('Razorpay');
  }


  /**
   * This method is used to initialize Razorpay payment process.
   * 
   */
  public function checkout()
  {
    // Load cart data from session
    $cart = $this->session->userdata('cart');
    
    if (!$cart) {
      redirect('cart'); // Redirect to cart page if cart is empty
    }

    // Calculate total amount from cart items
    $total_amount = $this->calculate_total($cart);

    // Prepare order data for Razorpay
    $orderData = [
      'amount' => $total_amount * 100, // Razorpay amount in paisa
      'currency' => 'INR',
      'receipt' => 'order_' . uniqid(),
      'payment_capture' => 1 // Auto capture payment
    ];

    // Create order in Razorpay
    $razorpay = new Razorpay();
    $razorpayOrder = $razorpay->createOrder($orderData);

    if (!$razorpayOrder) {
      // Order creation failure
      redirect('cart');
    }

    // Save Razorpay order ID to session
    $this->session->set_userdata('razorpay_order_id', $razorpayOrder->id);

    // Load Razorpay checkout form
    $data['razorpay_order_id'] = $razorpayOrder->id;
    $data['amount'] = $orderData['amount'];
    $data['total'] = $total_amount;

    $this->load->view('layouts/header');
    $this->load->view('payment/checkout', $data); // Load your checkout form view
    $this->load->view('layouts/footer');
  }


  /**
   * This method is used to handle Razorpay payment success callback.
   * 
   */
  public function success()
  {
    // Verify payment using Razorpay signature
    $attributes = $this->input->post();
    $razorpay = new Razorpay();

    if ($razorpay->verifyPaymentSignature($attributes)) {
      // Payment successful, update order status or process further
      $razorpay_order_id = $this->session->userdata('razorpay_order_id');
      // Clear Razorpay order ID from session
      $this->session->unset_userdata('razorpay_order_id');

      redirect('payment/success');
    } else {
      // Payment verification failed
      redirect('payment/failure');
    }
  }


  /**
   * This method is used to calculate total amount from cart items.
   *
   * @param array $cart Cart items
   * 
   * @return float 
   */
  private function calculate_total($cart)
  {
    $total = 0;
    foreach ($cart as $item) {
      $total += $item['qty'] * $item['price'];
    }
    return $total;
  }


  /**
   * This method is used to show success page
   * 
   */
  public function success_page()
  {
    $this->load->view('layouts/header');
    $this->load->view('payment/payment_success'); // Load your success page view
    $this->load->view('layouts/footer');
  }


  /**
   * This method used to show failure page
   * 
   */
  public function failure_page()
  {
    $this->load->view('layouts/header');
    $this->load->view('payment/payment_failure'); // Load your failure page view
    $this->load->view('layouts/footer');
  }
}
