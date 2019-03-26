<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>


    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "template/menuheader.php"; ?>
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col" style="padding-left: 20%; padding-right: 20%">
                        <div class="card">
                            <div class="card-header" style="text-align: center;">
                                <strong>Edit Kategori</strong>
                            </div>
                            <div class="card-body card-block">
                                <?php
                              include ("../config/koneksi.php");
                              $edit = mysqli_query($connect,"SELECT * FROM kategori WHERE kdkategori='$_GET[id]'");
                              $data    = mysqli_fetch_array($edit);
                              echo "
                                <form action='includes/update/update_kategori.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>Kode Kategori</label></div>
                                        <div class='col-12 col-md-9'><input type='text' readonly value=$data[kdkategori] id='kdkategori' name='kdkategori' class='form-control'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>Nama Kategori</label></div>
                                        <div class='col-12 col-md-9'><input type='text' value='$data[namakategori]' id='namakategori' name='namakategori' placeholder='Nama Kategori . . .' class='form-control'></div>
                                    </div>
                                    <div style='text-align: center;''>
                                        <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
                                        <button type='submit' class='btn btn-primary'>Simpan</button>
                                    </div>
                                </form>";
                                ?>
                            </div>
                            <div class="card-footer">
                                <h6>
                                    <i class="fa fa-dot-circle-o"></i> Catatan kecil untuk petunjuk
                                </h6>
                            </div>
                        </div>
                    </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php include "template/footer.php"; ?>