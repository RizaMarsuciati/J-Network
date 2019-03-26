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
                                <strong>Tambah Produk Jasa</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="includes/insert/input_jasa.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Jasa</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="namajasa" name="namajasa" placeholder="Nama Jasa . . ." required="required" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                    <?php
                                    include ("../config/koneksi.php");
                                    echo "
                                        <div class='col col-md-3'>Kategori</div>
                                        <div class='col-12 col-md-9'>
                                        <select class='form-control' name='kdkategori' id='kdkategori'>
                                        <option value='' disable selected>- Pilih Kategori -</option>";

                                        $tampil=mysqli_query($connect, "SELECT * FROM kategori ORDER BY namakategori");
                                        while ($data=mysqli_fetch_array($tampil)){
                                 echo "
                                    <option value=$data[kdkategori]> $data[namakategori]</option>
                                 ";
                                }
                                echo "
                                  </select>";             
                                  ?>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Harga</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="hargajasa" name="hargajasa" placeholder="Harga . . ." required="required" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Keterangan</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ketjasa" name="ketjasa" placeholder="Keterangan . . ." required="required" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="gambar" name="gambar" class="form-control-file"></div>
                                    </div>
                                    <div style="text-align: center;">
                                        <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
                                        <button type='submit' class='btn btn-primary'>Tambah</button>
                                    </div>
                                </form>
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