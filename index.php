<?php include "template/header.php"; ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/slider.png" alt="..." style="background-size: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Banner Terbaru 2019</h5>
        <p>Isikan keterangan dengan beberapa kata</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/slider.png" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Banner Terbaru 2019</h5>
        <p>Isikan keterangan dengan beberapa kata</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/slider.png" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Banner Terbaru 2019</h5>
        <p>Isikan keterangan dengan beberapa kata</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/slider.png" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Banner Terbaru 2019</h5>
        <p>Isikan keterangan dengan beberapa kata</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <section>
        <div class="container-fluid">
            <div class="row" style="background-color: white; padding: 2%; text-align: center;">
                <div class="col-md-3" >
                    <ul>
                      <img class="img-fluid rounded mb-3" src="assets/images/bri.png" style="width: 50%; height: 50%;" alt=''>
                      <!-- <h6>BRI</h6> -->
                    </ul>
                </div>
                <div class="col-md-3" >
                    <ul>
                      <img class="img-fluid rounded mb-3" src="assets/images/alfamart.png" style="width: 50%; height: 50%;" alt=''>
                      <!-- <h6>BRI</h6> -->
                    </ul>
                </div>
                <div class="col-md-3" >
                    <ul>
                      <img class="img-fluid rounded mb-3" src="assets/images/jne.png" style="width: 50%; height: 50%;" alt=''>
                      <!-- <h6>BRI</h6> -->
                    </ul>
                </div>
                <div class="col-md-3" >
                    <ul>
                      <img class="img-fluid rounded mb-3" src="assets/images/logo.png" style="width: 50%; height: 50%;" alt=''>
                      <!-- <h6>BRI</h6> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main-block light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Promo terbaru!!!</h3>
                    </div>
                </div>
            </div>

            <div class="row">
            
                <?php
                    $no=0;
                    require "config/koneksi.php";
                    $tampil = mysqli_query($connect, "SELECT promo.kdpromo, promo.harga, promo.hargapromo,promo.tglakhir, promo.gambar,produk.namaproduk, promo.namapromo,promo.tglmulai,promo.tglakhir FROM promo JOIN produk ON promo.kdproduk=produk.kdproduk  ORDER BY kdpromo DESC LIMIT 4");
                    while($data = mysqli_fetch_array($tampil))
                    {
                        $no++;

                     if(!(strtotime($data['tglmulai'])<=time()AND time()>=strtotime($data['tglakhir'])))
                    {
                    echo"
                <div class='col-md-4 featured-responsive'>
                   
                    <div class='featured-place-wrap' style='padding: 5%; border-radius: 3%;''>
                        ";?>
                       <img src="<?php echo "admin/assets/img/uploads/promo/" .$data['gambar']; ?>" class="img-fluid" alt="#">
                       <?php echo"

                            <span class='featured-rating-orange'>$no</span>
                            <div class='featured-title-box'>
                                <h6>$data[namaproduk]</h6>
                                <p>$data[namapromo]</p>
                                <p></p>
                                <ul>
                                    <li><span class='icon-volume-2'></span>
                                        <p>Promo Barang</p>
                                    </li>
                                    <li><span class='icon-tag'></span>
                                        <p><strike>Rp.$data[harga]</strike></p>  <p>Rp.$data[hargapromo]</p>
                                    </li>
                                </ul>
                                
                                <div class='bottom-icons'>
                                    <div class='open-now'>PROMO TERBARU</div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                ";
                    }
                
                    }
                ?>
            </div>

                        <div class="row">
                <?php
                    $no=0;
                    require "config/koneksi.php";
                    $tampil = mysqli_query($connect, "SELECT promojasa.kdpromo, promojasa.harga, promojasa.hargapromo, promojasa.gambar,jasa.namajasa, promojasa.namapromo,promojasa.tglmulai,promojasa.tglakhir FROM promojasa JOIN jasa ON promojasa.kdjasa=jasa.kdjasa  ORDER BY kdpromo DESC LIMIT 4");
                    while($data = mysqli_fetch_array($tampil))
                    {
                        $no++;
                     
                     if(!(strtotime($data['tglmulai'])<=time()AND time()>=strtotime($data['tglakhir'])))
                    {   
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
                    }
             ?>
                </div>





        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Apa yang Anda cari?</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <?php 
                require "config/koneksi.php";
                $no = 0;
                $tampil = mysqli_query($connect, "SELECT produk.gambar, produk.kdproduk,produk.namaproduk,kategori.namakategori, produk.hargaproduk,produk.ketproduk  FROM produk JOIN kategori ON produk.kdkategori=kategori.kdkategori ORDER BY kdproduk DESC LIMIT 6");
                while($data = mysqli_fetch_array($tampil))
                {
                $no++
                ?>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap" style="padding: 5%; border-radius: 3%;">
                        
                            <img src="<?php echo "admin/assets/img/uploads/produk/" .$data['gambar']; ?>" class="img-fluid" alt="#">
                            <span class="featured-rating-green"><?php echo $no; ?></span>
                            <div class="featured-title-box">
                                <h6><?php echo $data['namaproduk']; ?></h6>
                                <p><?php echo $data['namakategori']; ?> </p>
                                <p></p>
                                <ul>
                                    <li><span class="icon-volume-2"></span>
                                        <p>Produk Barang</p>
                                    </li>
                                    <li><span class="icon-tag"></span>
                                        <p><strike></strike> <br><p><?php echo $data['hargaproduk']; ?></p></p>
                                    </li>
                                </ul>
                                <span>• </span>
                                <p><?php echo $data['ketproduk']; ?></p>
                                <div class="bottom-icons">
                                    <div class="open-now">TERBARU</div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
                


                <!--============================= Jasa =============================-->
            <div class="row">

                <?php 
                require "config/koneksi.php";
                $no = 0;
                $tampil = mysqli_query($connect, "SELECT jasa.gambar, jasa.kdjasa,jasa.namajasa,kategori.namakategori, jasa.hargajasa,jasa.ketjasa  FROM jasa JOIN kategori ON jasa.kdkategori=kategori.kdkategori ORDER BY kdjasa DESC LIMIT 6");
                while($data = mysqli_fetch_array($tampil))
                {
                $no++
                ?>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap" style="padding: 5%; border-radius: 3%;">
                       
                            <img src="<?php echo "admin/assets/img/uploads/jasa/" .$data['gambar']; ?>" class="img-fluid" alt="#">
                            <span class="featured-rating-orange"><?php echo $no; ?></span>
                            <div class="featured-title-box">
                                <h6><?php echo $data['namajasa']; ?></h6>
                                <p><?php echo $data['namakategori']; ?> </p> 
                                <br>
                                <ul>
                                    <li><span class="icon-volume-2"></span>
                                        <p>Produk Jasa</p>
                                    </li>
                                    <li><span class="icon-tag"></span>
                                        <p><strike></strike> <br><p><?php echo $data['hargajasa']; ?></p></p>
                                    </li>
                                </ul>
                                <span>• </span>
                                <p><?php echo $data['ketjasa']; ?></p>
                                <div class="bottom-icons">
                                    <div class="open-now">TERBARU</div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                <?php
                }
                ?>




            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="produk.php" class="btn btn-danger">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END FEATURED PLACES -->
    <!--============================= CATEGORIES =============================-->
    <section class="main-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Kelebihan Kami</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 category-responsive">
                        <div class="category-block">
                            <img src="assets/images/cash.png" style="width: 50%; height: 50%;">
                            <h6>Harga Murah</h6>
                        </div>
                </div>
                <div class="col-md-3 category-responsive">
                        <div class="category-block">
                            <img src="assets/images/terpercaya.png" style="width: 50%; height: 50%;">
                            <h6>Terpercaya</h6>
                        </div>
                </div>
                <div class="col-md-3 category-responsive">
                        <div class="category-block">
                            <img src="assets/images/ramah.png" style="width: 50%; height: 50%;">
                            <h6>Pelayanan Ramah</h6>
                        </div>
                </div>
                <div class="col-md-3 category-responsive">
                        <div class="category-block">
                            <img src="assets/images/cepat.png" style="width: 50%; height: 50%;">
                            <h6>Pelayanan Cepat</h6>
                        </div>
                </div>
            </div>


        </div>
    </section>
    <!--//END CATEGORIES -->
    <!--============================= ADD LISTING =============================-->
    <section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Reach millions of People</h2>
                        <p>Add your Business infront of millions and earn 3x profits from our listing</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger"><span class="ti-plus"></span> ADD LISTING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->

<?php include "template/footer.php"; ?>