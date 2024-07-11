<div class="row">
    <div class="col-md-9 offset-md-2">
        <div class="card">
            <div class="card-header">
              <div class="text-center">
                Edit Product
              </div>
            </div>
            <div class="card-body">
                <!-- <h2>Edit Product</h2> -->
              <?php if(validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo validation_errors(); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>
              <form action="<?= base_url('product/update/' . $product_detail['product_id']) ?>" method="post">
                <div class="form-group">
                  <label for="name">Product Name:</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name', $product_detail['product_name']) ?>">
                </div>
                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea class="form-control" id="description" name="description"><?= set_value('description', $product_detail['description']) ?></textarea>
                </div>
                <div class="form-group">
                  <label for="price">Price:</label>
                  <input type="text" class="form-control" id="price" name="price" value="<?= set_value('price', $product_detail['price']) ?>">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-2">Update</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
