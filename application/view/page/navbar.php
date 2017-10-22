<!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                          
                            <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-7">
                            <?php if(($this->session->userdata('name'))==NULL) {?>

                            <div class="login">
                                <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>
                                <a href=<?php echo base_url('index.php/register/viewreg')?>><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Sign up</span></a>
                            </div> 
                            <?php } else { ?>
                            <div class="login">
                                <a href="#"><i class="fa fa-User"></i><?php echo ($this->session->userdata('name')); ?></span></a>
                
                            </div> 
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- *** TOP END *** -->
<!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                                <img src=<?php echo base_url("assets/img/logolbmm2.png")?> alt="LBMM logo" class="hidden-xs hidden-sm">
                                <img src=<?php echo base_url("assets/img/logolbmm.png")?> style="width:150px;height:50px;" alt="LBMM logo" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                            
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown active">
                                    <a href=<?php echo base_url("index.php/Welcome/index")?>>Home </a>
                                </li>
                                
                                <li class="dropdown">
                                    <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Layanan<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="">Daftar Layanan/Services</a>
                                        </li>
                                        <li><a href="">Layanan Darurat</a>
                                        </li>
                                        <?php if(($this->session->userdata('name'))==NULL) {?>
                                        <li></li>
                                        <?php } else { ?>
                                        <li><a href=<?php echo base_url('index.php/booking/viewBooking')?>>Booking</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href=<?php echo base_url('')?>>Tips Trik</a>
                                </li>

                                <!--PROMO-->
                                <li class="dropdown">
                                    <a href=<?php echo base_url(' ')?>>PROMO</a>
                                </li>
                                
                                <!--AKUN -->
                                 <?php if(($this->session->userdata('name'))==NULL) {?>
                                 <li>
                                </li>
                                <?php } else { ?>
                                <li class="dropdown">
                                    <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Akun<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="">Edit Profil</a>
                                        </li>
                                        <li><a href="<?php echo base_url().'index.php/login/logout'?>">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                               <?php } ?> 
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->

        </header>

        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url().'index.php/login/aksi_login'?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name = "username" placeholder="username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main" type="submit" value="login"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><strong>Register now</strong>!</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->