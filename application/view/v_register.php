<!DOCTYPE html>

<body>
        <!-- FORM REGISTER -->
        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>New account</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">New account</h2>
                            <p class="lead">Belum menjadi anggota?</p>
                            <p>Daftarkan akunmu untuk bisa mendapatkan layanan yang terbaik dari LBMM!</p>
                            <hr>

                            <form action=<?php echo base_url().'index.php/register/create'?> enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" id="name-login" name="name" placeholder="Example: John Smith" pattern="[A-Za-z\s]+" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" id="email-login" name="username" placeholder="Example: johnsmith@email.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Example: 0812345xxx" pattern="[0-9]+" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password-login" name="password" placeholder="minimal 8 characters" pattern=".{8,}" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
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

        <!--FORM REGISTER END -->