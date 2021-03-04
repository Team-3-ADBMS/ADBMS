<header>
    <!-- header inner -->
    <div class="header-top">
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="<?=base_url('/')?>"><img src="assets/images/logo.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
                        <div class="header_information">
                            <div class="menu-area">
                                <div class="limit-box">
                                    <nav class="main-menu ">
                                        <ul class="menu-area-main">
                                            <li class="active"> <a href="<?=base_url('/')?>">Home</a> </li>
                                            <?php if(islogin()){?>
                                            <li> <a href="<?=base_url('/myprofile')?>">My Profile</a> </li>
                                            <li> <a href="<?=base_url('/myaccounts')?>">My Accounts</a> </li>
                                            <li> <a href="<?=base_url('/netbanking')?>">Net Banking</a> </li>
                                            <?php }?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="mean-last">
                                <?php if(islogin()){?>
                                    <a><?= $this->session->userdata('user')['email']?></a>
                                    <a href="<?= base_url('logout') ?>">LOGOUT</a>
                                <?php }else{?>
                                    <a href="<?= base_url('login') ?>">LOGIN</a>
                                    <a href="<?= base_url('signup') ?>">SIGNUP</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->

        <!-- end header -->
    </div>
</header>
