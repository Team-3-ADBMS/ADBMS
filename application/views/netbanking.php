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
    <div class="net-banking-page profile-page">
        <div class="row">
            <div class="col-md-9 col-sm-12 offset-md-3">
                <?php if (@$messages['successMessage']) { ?>
                    <div class="successMessage"><?= $messages['successMessage'] ?></div>
                <?php } ?>
                <?php if (@$messages['error']) { ?>
                    <div class="error">
                        <?php echo @$messages['error']; ?>
                    </div>
                <?php } ?>
                <!-- <div class="beforeCard"> -->
                <div class="card text-white bg-transparent detail-card">
                    <div class="card-body">
                        <h2 class="card-title text-white">Net Banking</h2>
                        <div class="card-text">
                            <form id="myprofileform" method="POST" action="<?= base_url('netbanking') ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="account_id">Select Your Account</label>
                                        <select id="account_id" class="form-control <?= (@$errors['account_id']) ? 'is-invalid' : '' ?>" name="account_id">
                                            <option value="">--select--</option>
                                            <?php foreach ($accounts as $ac) { ?>
                                                <option value="<?= $ac['ACCT_ID'] ?>"><?= $ac['ACCT_ID'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php if (@$errors['account_id']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['account_id'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="amount">Amount</label>
                                        <input type="text" class="form-control <?= (@$errors['amount']) ? 'is-invalid' : '' ?>" name="amount" id="amount" value="" placeholder="Enter Transfer Amount">
                                        <?php if (@$errors['amount']) { ?>
                                            <div class="invalid-feedback">
                                                <?= $errors['amount'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <br />
                                <br />
                                <hr />
                                <br />
                                <br />
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="beneficiary">Select Beneficiary</label>
                                        <select id="beneficiary_id" class="form-control" name="beneficiary_id">
                                            <option value="">--select--</option>
                                            <?php foreach ($beneficiaries as $ac) { ?>
                                                <option value="<?= $ac['BENEF_ID'] ?>"><?= $ac['BENEF_NM'] . '-' . $ac['ACCT_ID']  ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="separator">OR Create Beneficiary</div>
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="BENEF_NM">Name</label>
                                        <input type="text" class="form-control" name="BENEF_NM" id="BENEF_NM" value="" placeholder="Enter Beneficiary Name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="EMAIL">Email</label>
                                        <input type="text" class="form-control" name="EMAIL" id="EMAIL" value="" placeholder="Enter Beneficiary Email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-7 ">
                                        <label for="ACCT_ID">Account Number</label>
                                        <input type="text" class="form-control" name="ACCT_ID" id="ACCT_ID" value="" placeholder="Enter Beneficiary Account No">
                                    </div>
                                </div>
                                <br />
                                <br />
                                <hr />
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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
    <script>
        $(document).ready(function() {
            $('.loader_bg').hide();
            $('.successMessage').fadeOut(15000)
            $('.error').fadeOut(15000);
        });
        $( "form" ).submit(function( event ) {
            $('.loader_bg').show();
        });
    </script>
</body>