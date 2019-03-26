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
                                <strong>Edit Produk Barang</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="includes/update/update_produk.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php
                            include ("../config/koneksi.php");
                                      $edit = mysqli_query($connect,"SELECT produk.kdproduk, produk.namaproduk, produk.hargaproduk, produk.gambar, produk.ketproduk, produk.gambar, kategori.namakategori, kategori.kdkategori FROM produk JOIN kategori ON produk.kdkategori=kategori.kdkategori WHERE produk.kdproduk='$_GET[id]'");
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
                                        <div class='col-12 col-md-9'><input type='text' readonly id='kdproduk' name='kdproduk' class='form-control' value='$data[kdproduk]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='' form-control-label'>Nama Barang</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='namaproduk' name='namaproduk' class='form-control' value='$data[namaproduk]'></div>
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
                                        <div class='col-12 col-md-9'><input type='text' id='hargaproduk' name='hargaproduk' class='form-control' value='$data[hargaproduk]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='' form-control-label'>Keterangan</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='ketproduk' name='ketproduk' class='form-control' value='$data[ketproduk]'></div>
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