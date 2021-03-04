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
    <div class="account-page profile-page">
        <div class="row">
            <div class="col-md-2 col-sm-12 offset-md-1">
                <!-- <div class="beforeCard"> -->
                <div class="card border-primary profile-card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Profile</h2>
                        <div class="card-text">
                            <ul>
                                <li class="op-summary-card">Account Summary</li>
                                <li class="op-beneficiaries-card">Beneficiaries</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-md-8 col-sm-12 summary-info-card">
                <?php if (@$errors['successMessage']) { ?>
                    <div class="successMessage"><?= $errors['successMessage'] ?></div>
                <?php } ?>
                <!-- <div class="beforeCard"> -->
                <div class="card text-white bg-transparent detail-card">
                    <div class="card-body">
                        <h2 class="card-title text-white">Accounts</h2>
                        <div class="card-text">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="account_id">Select Account</label>
                                    <select id="account_id" class="form-control" name="acc_id">
                                        <option value="">--select--</option>
                                        <?php foreach ($accounts as $ac) { ?>
                                            <option value="<?= $ac['ACCT_ID'] ?>"><?= $ac['ACCT_ID'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="accountDetails table-responsive">
                                <table class="table table-dark table-hover table-striped ">
                                    <thead>
                                    </thead>
                                    <tbody class="detailBody">
                                        <tr>
                                            <td>Account</td>
                                            <td id="acct_id"></td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td id="description"></td>
                                        </tr>
                                        <tr>
                                            <td>Opened At</td>
                                            <td id="open_date"></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td id="status"></td>
                                        </tr>
                                        <tr>
                                            <td>Current Balance</td>
                                            <td id="balance"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <br />
                            <h3 class="card-title text-white">Last 10 Transactions</h3>
                            <div class="transDetails table-responsive">
                                <table class="table table-bordered table-hover table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Txn Date</th>
                                            <th>Txn Id</th>
                                            <th>Beneficiary Name</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody class="transDetailBody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-md-8 col-sm-12 offset-md-3 beneficiaries-info-card hide-data">
                <?php if (@$errors['successMessage']) { ?>
                    <div class="successMessage"><?= $errors['successMessage'] ?></div>
                <?php } ?>
                <!-- <div class="beforeCard"> -->
                <div class="card text-white bg-transparent detail-card">
                    <div class="card-body">
                        <h2 class="card-title text-white">Beneficiaries</h2>
                        <div class="card-text">
                            <div class="beneficiariesDetails table-responsive">
                                <table class="table table-dark table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Acount Id</th>
                                            <th>Added At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="beneficiariesDetailBody">
                                        <?php foreach($beneficiaries as $key => $beneficiary){?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$beneficiary['BENEF_NM']?></td>
                                            <td><?=$beneficiary['EMAIL']?></td>
                                            <td><?=$beneficiary['ACCT_ID']?></td>
                                            <td><?=$beneficiary['CREATED_DATE']?></td>
                                            <td><?=($beneficiary['STATUS'] == 'Y'?'Active':'Inactive')?></td>
                                        </tr>
                                        <?php }?>

                                    </tbody>
                                </table>
                            </div>
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
            $('.successMessage').fadeOut(5000);
            $('#account_id').change(function() {
                $('.loader_bg').show();
                var acc_id = $(this).val();
                if (acc_id) {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('/getAccountInfo') ?>",
                        data: {
                            account_id: acc_id,
                        },
                        dataType: "json",
                        success: function(data) {
                            $.each(data.account, function(index, val) {
                                $('#' + index.toLowerCase() + '').text(val);
                            });
                            var html = '';
                            $.each(data.transactions, function(index, el) {
                                html += '<tr>' +
                                    '<td>' + el['TRANDATE'] + '</td>' +
                                    '<td>' + el['TRAN_ID'] + '</td>' +
                                    '<td>' + ((el['BENEF_NM'])?el['BENEF_NM']:'') + '</td>' +
                                    '<td>' + ((el['TRAN_TYPE'] == 1) ? el['TRAN_AMOUNT'] : '') + '</td>' +
                                    '<td>' + ((el['TRAN_TYPE'] == 2) ? el['TRAN_AMOUNT'] : '') + '</td>' +
                                    '<td>' + el['TOTAL_AMT'] + '</td>' +
                                    +'</tr>';
                            });
                            $('.transDetailBody').html(html);
                            $('.loader_bg').hide();
                        },
                        error: function(error) {
                            $('.loader_bg').hide();
                            // $.unblockUI();
                            alert('something went wrong! Try again.')
                        }
                    });
                }
            })
            $('.op-summary-card').click(function() {
                $('.beneficiaries-info-card').slideUp();
                $('.summary-info-card').slideDown();
            })
            $('.op-beneficiaries-card').click(function() {
                $('.summary-info-card').slideUp();
                $('.beneficiaries-info-card').slideDown();
            })
        });
    </script>
</body>