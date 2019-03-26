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
                                <strong>Edit Produk Jasa</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="includes/update/update_jasa.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php
                            include ("../config/koneksi.php");
                                      $edit = mysqli_query($connect,"SELECT jasa.kdjasa, jasa.namajasa, jasa.hargajasa, jasa.ketjasa, jasa.gambar, kategori.namakategori, kategori.kdkategori FROM jasa JOIN kategori ON jasa.kdkategori=kategori.kdkategori WHERE jasa.kdjasa='$_GET[id]'");
                                      $data    = mysqli_fetch_array($edit);

                            ?>
                            <center>
                                <div> <!-- Gambar -->
                                <img src='assets/img/uploads/produk/<?php echo $data['gambar'];?>' style="width: 40%; height: 40%;">
                                </div>
                                <div class="form-group">
                                <label style="text-align: left;">Gambar Barang</label><br>
                                <input type="file" name="gambar" id="gambar">
                                </div>
                            </center>
                            <?php
                            echo"
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class=' form-control-label'>Kode Barang</label></div>
                                        <div class='col-12 col-md-9'><input type='text' readonly id='kdjasa' name='kdjasa' class='form-control' value='$data[kdjasa]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='' form-control-label'>Nama Barang</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='namajasa' name='namajasa' class='form-control' value='$data[namajasa]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='selectSm' class=' form-control-label'>Kategori</label></div>
                                        <div class='col-12 col-md-9'>
                                        <select class='form-control' id='kdkategori' name='kdkategori'>";
                                                
                                    $tampil=mysqli_query($connect, "SELECT * FROM kategori ORDER BY namakategori");
                                    while ($kategori=mysqli_fetch_array($tampil)){
                            ?>
                                    <option value="<?=$kategori['kdkategori']?>"<?php
                                    if ($kategori['kdkategori'] == $data['kdkategori']) {
                                    echo ' selected="selected"';
                                    }
                                    ?>><?=$kategori['namakategori']?></option>
                                    <?php
                                    }
                                    echo "
                                            </select>
                                    </div>
                                    </div>

                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='' form-control-label'>Harga</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='hargajasa' name='hargajasa' class='form-control' value='$data[hargajasa]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='' form-control-label'>Keterangan</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='ketjasa' name='ketjasa' class='form-control' value='$data[ketjasa]'></div>
                                    </div>";
                                    ?>
                                <?php
                                echo "
                                <center>
                                        <button type='submit' class='btn btn-primary'>Simpan</button>
                                        <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
                                </center>
                                 ";
                                ?>
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