<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require_once APPPATH . 'third_party/razorpay/src';
use Razorpay\Api\Api;

class Razorpay
{

  protected $ci;
  protected $api;

  public function __construct()
  {
    $this->ci = &get_instance();
    $this->ci->config->load('razorpay'); // Load your Razorpay configuration file

    // Initialize Razorpay API with your key_id and key_secret
    $key_id = $this->ci->config->item('razorpay_key_id');
    $key_secret = $this->ci->config->item('razorpay_key_secret');

    $this->api = new Api($key_id, $key_secret);
  }

  /**
   * Create an order with Razorpay
   *
   * @param array $orderData Order details
   * @return object Razorpay Order
   */
  public function createOrder($orderData)
  {
    try {
      $order = $this->api->order->create($orderData);
      return $order;
    } catch (\Exception $e) {
      log_message('error', 'Razorpay createOrder error: ' . $e->getMessage());
      return false;
    }
  }

  /**
   * Verify the payment signature
   *
   * @param array $attributes Payment attributes to verify
   * @return bool True if the signature is valid, otherwise false
   */
  public function verifyPaymentSignature($attributes)
  {
    try {
      $this->api->utility->verifyPaymentSignature($attributes);
      return true;
    } catch (\Exception $e) {
      log_message('error', 'Razorpay verifyPaymentSignature error: ' . $e->getMessage());
      return false;
    }
  }
}
