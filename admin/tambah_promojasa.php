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
                                <strong>Tambah Promo Jasa</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="includes/insert/input_promojasa.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Promo</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="namapromo" name="namapromo" placeholder="Nama Promo . . ." required="required" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="jenis" class=" form-control-label">Jenis Promo</label></div>
                                        <div class="col-12 col-md-9">
                                            <select id="jenis" name="jenis" class="form-control-sm form-control">
                                                <option value="0">Pilih Promo</option>
                                                <option value="barang">Promo Barang</option>
                                                <option value="jasa">Promo Jasa</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                <div class="row form-group">
                                    <?php
                                    include ("../config/koneksi.php");
                                    echo "
                                        <div class='col col-md-3'>Nama Jasa</div>
                                        <div class='col-12 col-md-9'>
                                        <select onchange='isi_otomatis()' class='form-control' name='kdjasa' id='kdjasa'>
                                        <option value='' disable selected>- Pilih Jasa -</option>";

                                        $tampil=mysqli_query($connect, "SELECT * FROM jasa ORDER BY namajasa");
                                        while ($data=mysqli_fetch_array($tampil)){
                                 echo "
                                    <option value=$data[kdjasa]> $data[namajasa]</option>
                                 ";
                                }
                                echo "
                                  </select>";             
                                  ?>
                                        </div>
                                    </div>   
                                    <?php
                                    echo " 
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='kd' class='form-control-label'>Kode Jasa</label></div>
                                        <div class='col-12 col-md-9'><input type='text' readonly id='kd' name='kd' placeholder='Kode Produk'  class='form-control'></div>
                                    </div>";
                                    ?>
                                    <?php
                                    echo " 
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='hargajasa' class='form-control-label'>Harga</label></div>
                                        <div class='col-12 col-md-9'><input type='text' readonly id='hargajasa' name='hargajasa' placeholder='Harga Produk'  class='form-control'></div>
                                    </div>";
                                    ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Harga Promo</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="hargapromo" name="hargapromo" placeholder="Harga Promo . . ." class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tgl Mulai</label></div>
                                        <div class="col-12 col-md-9"><input type="date" id="tglmulai" name="tglmulai" placeholder="yyyy-mm-dd" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tgl Berakhir</label></div>
                                        <div class="col-12 col-md-9"><input type="date" id="tglakhir" name="tglakhir" placeholder="yyyy-mm-dd"  class="form-control"></div>
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
             var kdjasa = $("#kdjasa").val();
             $.ajax({
                 url:'ajaxpromojasa.php',
                 data:"kdjasa="+kdjasa,
             }).done(function (data){
                 var json = data;
                 obj = JSON.parse(json);
                 $('#hargajasa').val(obj.hargajasa);
                 $('#kd').val(obj.kd);
             });
         }
</script>