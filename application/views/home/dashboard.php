<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <h4>Products</h4>
      <a href="<?= base_url('product/create') ?>" class="btn btn-sm btn-primary" style='font-size:25px'>Create</a>
    </div>
  </div>
  <div class="card-body">
    <?php if($this->session->flashdata('success_message')) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('success_message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <?php if($this->session->flashdata('error_message')) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error_message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Created On</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
          <tr>
            <th scope="row"><?php echo $product['product_id']; ?></th>
            <td><?php echo $product['product_name']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['created_at']; ?></td>
            <td>
              <a href="<?= base_url('product/edit/' . $product['product_id']) ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="<?= base_url('product/delete/' . $product['product_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>