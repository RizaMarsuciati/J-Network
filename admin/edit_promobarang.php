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
                                <strong>Edit Promo</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="includes/update/update_promobarang.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <?php
                                include ("../config/koneksi.php");
                                      $edit = mysqli_query($connect,"SELECT promo.kdpromo,promo.namapromo, promo.jenispromo,produk.namaproduk,produk.kdproduk,produk.hargaproduk, promo.hargapromo,promo.tglmulai,promo.tglakhir,user.nama,promo.gambar FROM promo LEFT JOIN produk ON promo.kdproduk=produk.kdproduk LEFT JOIN user ON promo.kduser=user.kduser WHERE promo.kdpromo='$_GET[id]'");
                                      $data    = mysqli_fetch_array($edit);

                                ?>
                                <center>
                                <div> <!-- Gambar -->
                                <img src='assets/img/uploads/promo/<?php echo $data['gambar'];?>' style="width: 40%; height: 40%;">
                                </div>
                                <div class="form-group">
                                <label style="text-align: left;">Gambar Barang</label><br>
                                <input type="file" name="gambar" id="gambar">
                                </div>
                            </center>
                            <?php
                            echo"
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='kdpromo' class='form-control-label'>Kode Promo</label></div>
                                        <div class='col-12 col-md-9'><input type='text' readonly  id='kdpromo' name='kdpromo' class='form-control' value='$data[kdpromo]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='namapromo' class='form-control-label'>Nama Promo</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='namapromo' name='namapromo' class='form-control' value='$data[namapromo]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='jenis' class='form-control-label'>Jenis Promo</label></div>
                                        <div class='col-12 col-md-9'>
                                            <select name='jenis' id='jenis' class='form-control-sm form-control' value='$data[jenispromo]'>
                                                <option>
                                                $data[jenispromo]
                                                </option>
                                                <option value='barang'>Promo Barang</option>
                                                <option value='jasa'>Promo Jasa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='kdproduk' class=' form-control-label'>Nama Produk</label></div>
                                        <div class='col-12 col-md-9'>
                                        <select onchange='isi_otomatis()' class='form-control' id='kdproduk' name='kdproduk'>";
                                                
                                    $tampil=mysqli_query($connect, "SELECT * FROM produk ORDER BY namaproduk");
                                    while ($produk=mysqli_fetch_array($tampil)){
                            ?>
                                    <option value="<?=$produk['kdproduk']?>"<?php
                                    if ($produk['kdproduk'] == $data['kdproduk']) {
                                    echo ' selected="selected"';
                                    }
                                    ?>><?=$produk['namaproduk']?></option>
                                    <?php
                                    }
                                    echo "
                                            </select>
                                    </div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='kd' class='form-control-label'>Kode Produk</label></div>
                                        <div class='col-12 col-md-9'><input type='text' readonly id='kd' name='kd' class='form-control' value='$data[kdproduk]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='hargaproduk' class='form-control-label'>Harga</label></div>
                                        <div class='col-12 col-md-9'><input type='text' readonly id='hargaproduk' name='hargaproduk' class='form-control' value='$data[hargaproduk]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='hargapromo' class='form-control-label'>Harga Promo</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='hargapromo' name='hargapromo' class='form-control' value='$data[hargapromo]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='tglmulai' class='form-control-label'>Tgl Mulai</label></div>
                                        <div class='col-12 col-md-9'><input type='date' id='tglmulai' name='tglmulai' class='form-control' value='$data[tglmulai]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='tglakhir' class='form-control-label'>Tgl Akhir</label></div>
                                        <div class='col-12 col-md-9'><input type='date' id='tglakhir' name='tglakhir' class='form-control' value='$data[tglakhir]'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='kduser' class='form-control-label'>Nama Admin</label></div>
                                        <div class='col-12 col-md-9'><input type='text' readonly id='kduser' name='kduser' class='form-control' value='$data[nama]'></div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
   $(function(){
     $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
    $("#tglmulai").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tglakhir").datepicker('setStartDate', startDate);
        if($("#tglmulai").val() > $("#tglakhir").val()){
          $("#tglakhir").val($("#tglmulai").val());
        }
    });
 });
</script>

<script>
function isi_otomatis(){
             var kdproduk = $("#kdproduk").val();
             $.ajax({
                 url:'ajaxharga.php',
                 data:"kdproduk="+kdproduk,
             }).done(function (data){
                 var json = data;
                 obj = JSON.parse(json);
                 $('#hargaproduk').val(obj.hargaproduk);
                 $('#kd').val(obj.kd);
             });
         }
</script>