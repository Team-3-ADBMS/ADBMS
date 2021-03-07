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
          <h2 class="card-title">Login</h2>
          <div class="card-text">
            <form id="loginform" method="POST" action="<?=base_url('login')?>">
              <div class="form-group">
                <label for="InputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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