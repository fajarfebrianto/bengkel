<!DOCTYPE html>

<body>
        <!-- FORM REGISTER -->
        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Booking</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">Book The Date</h2>
                            <p class="lead">Kendaraanmu rusak?</p>
                            <p>Daftarkan namamu dan kendaraanmu untuk bisa mendapatkan layanan terbaik dari LBMM!</p>
                            <hr>

                            <form action=<?php echo base_url().'index.php/booking/createBooking'?> enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input name="name" type="text" autocomplete="off" class="textbox" value=<?php echo $this->session->userdata('name'); ?> disabled>
                                </div>
                                <div class="form-group">
                                    <label for="username">Jenis Kendaraan</label>
                                    <input type="text" class="form-control" id="jenisKendaraan" name="jenisKendaraan" placeholder="Example: Jenis Beat Merk Honda keluaran tahun 2015" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Keluhan</label>
                                    <input type="text-area" class="form-control" id="keluhan" name="keluhan" placeholder="Example: Ketika mesin dinyalakan suara mesin terdengar grumusuk" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Tanggal Booking</label>
                                    <input type="date" class="form-control" id="tanggalBook" name="tanggalBook" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Submit</button>
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