<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
              <div class="text-center">
                Register
              </div>
            </div>
            <div class="card-body">
                <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php echo validation_errors(); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>
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
                <form action="<?php echo base_url('register/form-submission'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="user-name" name="user_name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Minimum of 8 characters">
                    </div>
                    <br>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Register</button>
                      <p class="mt-2">Already have an account! then <a href="<?php echo base_url('login'); ?>">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
