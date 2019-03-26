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
                        <a href="produk_barang.php" class="btn btn-danger">Barang</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="featured-btn-wrap">
                        <a href="produk_jasa.php" class="btn btn-danger">Jasa</a>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <?php
                
                include ("config/koneksi.php");
                $halaman = 10;
                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total,jasa.gambar, jasa.kdjasa, jasa.namajasa,kategori.namakategori, jasa.hargajasa, jasa.ketjasa FROM jasa JOIN kategori ON jasa.kdkategori=kategori.kdkategori ORDER BY kdjasa DESC"))['total'];
                $pages=ceil($total/$halaman);
                $tampil = mysqli_query($connect, "SELECT jasa.gambar, jasa.kdjasa, jasa.namajasa,kategori.namakategori, jasa.hargajasa, jasa.ketjasa  FROM jasa JOIN kategori ON jasa.kdkategori=kategori.kdkategori ORDER BY kdjasa DESC LIMIT $mulai, $halaman");
                $no = $mulai;
                while($data = mysqli_fetch_array($tampil))
                {
                $no++;
                ?>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap" style="padding: 5%; border-radius: 3%;">
                       
                            <img src="<?php echo "admin/assets/img/uploads/jasa/" .$data['gambar']; ?>" class="img-fluid" alt="#">
                            <div class="featured-title-box">
                                <h6><?php echo $data['namajasa']; ?></h6>
                                <p><?php echo $data['namakategori']; ?> </p>
                                <ul>
                                    <li><span class="icon-tag"></span>
                                        <p>Rp.<?php echo $data['hargajasa']; ?></p>
                                    </li>
                                </ul>
                                <div class="bottom-icons">
                                    <div class="open-now"><?php echo $data['ketjasa']; ?></div>
                                </div>
                            </div>
                        
                    </div>
                </div>
               
                <?php
                }
                ?>

               

            </div>
                <div style="text-align: center;">
                 <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i=1; $i<=$pages ; $i++){ ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                    </ul>
                 </nav>
                </div>
        </div>
    </section>

<?php include "template/footer.php"; ?>
