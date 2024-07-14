<h2>Checkout</h2>
<p>Total Amount: &#8377;<?= number_format($total, 2) ?></p>
<form action="<?= base_url('payment/charge') ?>" method="post">
  <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="your_razorpay_key" // Replace with your Razorpay Key ID data-amount="<?= $total * 100 ?>" // Amount is in currency subunits (paisa) data-currency="INR" data-order_id="<?= $razorpay_order_id ?>" // Replace with the order ID generated in the backend data-buttontext="Pay with Razorpay" data-name="Shopping Cart" data-description="Payment for Shopping Cart" data-image="https://your-logo-url.com/logo.png" data-prefill.name="" data-prefill.email="" data-theme.color="#F37254"></script>
  <input type="hidden" custom="Hidden Element" name="hidden">
</form>