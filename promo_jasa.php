<?php include "template/header.php"; ?>

<section class="main-block" style="background-image: url(assets/images/background-home.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading" style="">
                        <h3 style="color: white;">Daftar Produk</h3>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <div class="featured-btn-wrap">
                        <a href="promo_barang.php" class="btn btn-danger">Barang</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="featured-btn-wrap">
                        <a href="promo_jasa.php" class="btn btn-danger">Jasa</a>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <?php
                    $no=0;
                    require "config/koneksi.php";
                    $tampil = mysqli_query($connect, "SELECT promojasa.kdpromo, promojasa.harga, promojasa.hargapromo, promojasa.gambar,jasa.namajasa, promojasa.namapromo,promojasa.tglmulai,promojasa.tglakhir FROM promojasa LEFT JOIN jasa ON promojasa.kdjasa=jasa.kdjasa  ORDER BY kdpromo DESC LIMIT 4");
                    while($data = mysqli_fetch_array($tampil))
                    {
                        $no++;
                     
                    
                    echo"
                <div class='col-md-4 featured-responsive'>
                   
                    <div class='featured-place-wrap' style='padding: 5%; border-radius: 3%;''>
                      ";?>
                       <img src="<?php echo "admin/assets/img/uploads/promo/" .$data['gambar']; ?>" class="img-fluid" alt="#">
                       <?php echo"
                            <span class='featured-rating-orange'>$no</span>
                            <div class='featured-title-box'>
                                <h6>$data[namajasa]</h6>
                                <p>Wifi </p> <span>• </span>
                                <p>Berakhir $data[tglakhir]</p>
                                <ul>
                                    <li><span class='icon-volume-2'></span>
                                        <p>Promo $data[namapromo]</p>
                                    </li>
                                    <li><span class='icon-tag'></span>
                                        <p><strike>Rp.$data[harga]</strike> <br><p>Rp.$data[hargapromo]</p></p>
                                    </li>
                                </ul>
                                <div class='bottom-icons'>
                                    <div class=open-now'>TERBARU</div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                ";
                       
                    }
             ?>
                </div>
            </div>

        </div>
    </section>

<?php include "template/footer.php"; ?>
