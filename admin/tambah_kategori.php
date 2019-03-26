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
                                <strong>Tambah Kategori Barang</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="includes/insert/input_kategori.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Kategori</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="namakategori" name="namakategori" placeholder="Nama Kategori . . ." required="required" class="form-control"></div>
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