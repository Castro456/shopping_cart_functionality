<!-- This is the head page for all the view files, so it eliminates the duplication of loading CDN  -->
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart Functionality</title>
    <!-- Bootwatch CSS -->
    <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php if($this->session->userdata('validated') == true) { ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard">Shopping Cart Functionality</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo base_url('dashboard'); ?>">Admin Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('cart'); ?>">Cart</a>
        </li>
      </ul>
       <span class="text-center">
        <?php echo $this->session->userdata('name'); ?>
       </span>
      <form class="d-flex" action="<?php echo base_url('logout'); ?>" method="post">
        &nbsp;<button type="submit" class="btn btn-outline-danger">Logout</button>
      </form>
    </div>
  </div>
</nav>
<?php }?>

<div class="container mt-4">
