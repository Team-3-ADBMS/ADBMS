<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . '../../includes/head.php' ?>

<!-- body -->

<body class="main-layout auth">
  <!-- loader  -->
  <!-- <div class="loader_bg">
    <div class="loader"><img src="assets/images/loading.gif" alt="#" /></div>
  </div> -->
  <!-- end loader -->
  <!-- header -->
  <?php include __DIR__ . '../../includes/header.php' ?>
  <div class="login-page">
  <div class="row">
    <div class="col-md-6 col-sm-12 offset-md-3">
      <div class="beforeCard">
      <div class="card border-primary login-card">
        <div class="card-body">
          <h2 class="card-title">Sign Up</h2>
          <div class="card-text">
            <form method="POST" action="<?=base_url('signup')?>">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="inputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="inputPassword2">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="inputPassword2" placeholder="Confirm Password">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php if(@$login_invalid){?>
            <div class="error">
              <?php echo @$login_invalid;?>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  </div>
</body>