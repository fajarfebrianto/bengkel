<!DOCTYPE html>

<body>
        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Pendaftaran Berhasil</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">Log in</h2>

                            <p class="lead">Silahkan Log in dengan akun yang telah dibuat</p>

                            <form action=<?php echo base_url().'index.php/login/aksi_login'?> enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control" id="username" name = "username" placeholder="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" value="login" class="btn btn-template-main"><i class="fa fa-user-md"></i>Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->