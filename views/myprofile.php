<?php include __DIR__ . '../includes/head.php' ?>

<!-- body -->

<body class="main-layout auth">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="assets/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <?php include __DIR__ . '../includes/header.php' ?>
    <div class="profile-page">
        <div class="row">
            <div class="col-md-2 col-sm-12 offset-md-1">
                <!-- <div class="beforeCard"> -->
                <div class="card border-primary profile-card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Profile</h2>
                        <div class="card-text">
                            <ul>
                                <li class="op-basic-card" data-toggle="collapse" data-target="#demo">Basic Info</li>
                                <li class="op-password-card">Password</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-md-8 col-sm-12 basic-info-card">
                <?php if (@$errors['successMessage']) { ?>
                    <div class="successMessage"><?= $errors['successMessage'] ?></div>
                <?php } ?>
                <!-- <div class="beforeCard"> -->
                <div class="card text-white bg-transparent detail-card">
                    <div class="card-body">
                        <h2 class="card-title text-white">Basic Information</h2>
                        <div class="card-text">
                            <form id="myprofileform" method="POST" action="<?= base_url('myprofile') ?>">
                                <div class="form-group mb-5">
                                    <p><b>Your Email address</b></p>
                                    <p><?= $EMAIL ?></p>
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="NAME">Name</label>
                                        <input type="text" class="form-control <?= (@$errors['POSTAL']) ? 'is-invalid' : '' ?>" name="CUSTOMER_NM" id="NAME" value="<?= $CUSTOMER_NM ?>" placeholder="Name">
                                        <?php if (@$errors['CUSTOMER_NM']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['CUSTOMER_NM'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="CONTACT_NO">Contact Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">+1</span>
                                            </div>
                                            <input type="text" class="form-control <?= (@$errors['CONTACT_NO']) ? 'is-invalid' : '' ?>" name="CONTACT_NO" id="CONTACT_NO" value="<?= $CONTACT_NO ?>" placeholder="Contact Number">
                                            <?php if (@$errors['CONTACT_NO']) { ?>
                                                <div class="invalid-feedback">
                                                    <?= $errors['CONTACT_NO'] ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-3">Gender</label><br />
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="MALE" value="Male" name="GENDER" <?= (trim($GENDER) == 'Male') ? 'checked' : '' ?> class="custom-control-input">
                                            <label class="custom-control-label" for="MALE">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="FEMALE" value="Female" name="GENDER" <?= (trim($GENDER) == 'Female') ? 'checked' : '' ?> class="custom-control-input">
                                            <label class="custom-control-label" for="FEMALE">Female</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="BIRTHDATE">Birthdate</label>
                                        <input type="text" class="form-control datepicker" readonly="readonly" name="BIRTHDATE" id="BIRTHDATE" value="<?= $BIRTHDATE ?>" placeholder="Birthdate">
                                    </div>
                                </div>
                                <br />
                                <br />
                                <hr />
                                <br />
                                <div class="form-group ">
                                    <label for="ADDRESS">Address</label>
                                    <input type="text" class="form-control <?= (@$errors['ADDRESS']) ? 'is-invalid' : '' ?>" name="ADDRESS" id="ADDRESS" value="<?= $ADDRESS ?>" placeholder="Address">
                                    <?php if (@$errors['ADDRESS']) { ?>
                                        <div class="invalid-feedback">
                                            <?= $errors['ADDRESS'] ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="CITY">City</label>
                                        <input type="text" class="form-control <?= (@$errors['CITY']) ? 'is-invalid' : '' ?>" name="CITY" id="CITY" value="<?= $CITY ?>" placeholder="City">
                                        <?php if (@$errors['CITY']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['CITY'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="PROVINCE">Province</label>
                                        <input type="text" class="form-control <?= (@$errors['PROVINCE']) ? 'is-invalid' : '' ?>" name="PROVINCE" id="PROVINCE" value="<?= $PROVINCE ?>" placeholder="Province">
                                        <?php if (@$errors['PROVINCE']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['PROVINCE'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="POSTAL">Postal</label>
                                        <input type="text" class="form-control <?= (@$errors['POSTAL']) ? 'is-invalid' : '' ?>" name="POSTAL" id="POSTAL" value="<?= $POSTAL ?>" placeholder="Postal">
                                        <?php if (@$errors['POSTAL']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['POSTAL'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <br />
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <?php if (@$login_invalid) { ?>
                                <div class="error">
                                    <?php echo @$login_invalid; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-md-8 col-sm-12 offset-md-3 password-info-card hide-data">
                <!-- <div class="beforeCard"> -->
                <div class="card text-white bg-transparent detail-card">
                    <div class="card-body">
                        <h2 class="card-title text-white">Change Password</h2>
                        <div class="card-text">
                            <form id="myprofileform" method="POST" action="<?= base_url('changePassword') ?>">
                                <div class="form-group mb-5">
                                    <p><b>Your Email address</b></p>
                                    <p><?= $EMAIL ?></p>
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="old_password">Old Password</label>
                                        <input type="password" class="form-control <?= (@$errors['old_password']) ? 'is-invalid' : '' ?>" name="old_password" id="old_password" value="" placeholder="Old Password">
                                        <?php if (@$errors['old_password']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['old_password'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="PASSWORD">New Password</label>
                                        <input type="password" class="form-control <?= (@$errors['PASSWORD']) ? 'is-invalid' : '' ?>" name="PASSWORD" id="PASSWORD" value="" placeholder="New Password">
                                        <?php if (@$errors['PASSWORD']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['PASSWORD'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control <?= (@$errors['confirm_password']) ? 'is-invalid' : '' ?>" name="confirm_password" id="confirm_password" value="" placeholder="Confirm Your Password">
                                        <?php if (@$errors['confirm_password']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['confirm_password'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <?php if (@$login_invalid) { ?>
                                <div class="error">
                                    <?php echo @$login_invalid; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.0.0.min.js"></script>
    <script src="assets/js/plugin.js"></script>
    <!-- sidebar -->
    <!-- <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script> -->
    <!-- <script src="assets/js/custom.js"></script> -->
    <!-- <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('.loader_bg').hide();
            $(".datepicker").datepicker({
                dateFormat: "dd-M-y",
                changeYear: true,
                changeMonth: true,
                maxDate: "-12y",
                showAnim: "fold",
                yearRange: "1920:-12y"
            });
            $('.op-basic-card').click(function() {
                $('.password-info-card').slideUp();
                $('.basic-info-card').slideDown();
            })
            $('.op-password-card').click(function() {
                $('.basic-info-card').slideUp();
                $('.password-info-card').slideDown();
            })
            var hash = window.location.hash;
            if (hash == '#password') {
                $('.op-password-card').click();
            }
            $('.successMessage').fadeOut(5000)
        });
        $( "form" ).submit(function( event ) {
            $('.loader_bg').show();
        });
    </script>
</body>