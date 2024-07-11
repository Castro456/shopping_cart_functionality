<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
              <div class="text-center">
                Login
              </div>
            </div>
            <div class="card-body">
                <?php //echo validation_errors(); ?>
                <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php echo validation_errors(); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>
                <?php if($this->session->flashdata('error_message')) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php echo $this->session->flashdata('error_message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>
                <form action="<?php echo base_url('login/auth'); ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <br>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Login</button>
                      <p class="mt-2">New user! then <a href="<?php echo base_url('register'); ?>">Sign-up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
