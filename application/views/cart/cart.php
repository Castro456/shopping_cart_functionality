<div class="row">
    <div class="col-md-8">
        <h2>Products</h2>
        <!-- Display Products -->
        <div class="row">
            <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['product_name'] ?></h5>
                        <p class="card-text"><?= $product['description'] ?></p>
                        <p class="card-text">&#8377;<?= number_format($product['price'], 2) ?></p>
                        <form action="<?= base_url('cart/add/' . $product['product_id']) ?>" method="post">
                          <input type="submit" class="btn btn-primary" value="Add to Cart">
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex justify-content-between">
            <h2>Cart</h2>
            <form action="<?= base_url('cart/clear') ?>" method="post">
            <button type="submit" class="btn btn-danger btn-sm mt-3" style='font-size:25px'><i class="fa fa-trash" aria-hidden="true" style='font-size:25px'></i></button>            
            </form>
        </div>
        <div class="mt-2"></div>
        <!-- Display Cart -->
        <?php if ($this->cart->total_items() > 0): ?>
        <form action="<?= base_url('cart/update') ?>" method="post">
            <ul class="list-group">
                <?php foreach ($cart as $item) { ?>
                <li class="list-group-item">
                    <strong><?= $item['name'] ?></strong>
                    <div class="float-end">
                      <input type="number" name="qty_<?= $item['rowid'] ?>" value="<?= $item['qty'] ?>">
                      <button type="submit" class="btn btn-sm btn-primary">Update</button>
                      <a href="<?= base_url('cart/remove/' . $item['rowid']) ?>" class="btn btn-sm btn-danger">Remove</a>
                    </div>
                </li>
                <?php } ?>
                <li class="list-group-item">
                    <!-- 2 is mentioned here to say that for decimals -->
                  <strong>Total:</strong> &#8377;<?= number_format($this->cart->total(), 2) ?>
                </li>
            </ul>
        </form>
        
        <?php else: ?>
        <p>Your Cart is empty</p>
        <?php endif; ?>
    </div>
</div>
