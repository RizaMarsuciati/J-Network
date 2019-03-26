<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>


    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "template/menuheader.php"; ?>
        <!-- Header-->
        
    <div class="content">
        <div class="animated fadeIn">
            <div class="container-fluid" style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tampil Promo</strong>
                        </div>
                        <?php
                        include ("../config/koneksi.php");
                        echo"
                        <div class='card-body'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th scope='col'>No</th>
                                        <th scope='col'>Kode Promo</th>
                                        <th scope='col'>Nama Promo</th>
                                        <th scope='co'>Jenis Promo</th>
                                        <th scope='col'>Nama Jasa</th>
                                        <th scope='col'>Harga Awal</th>
                                        <th scope='col'>Harga Promo</th>
                                        <th scope='col'>Mulai</th>
                                        <th scope='col'>Berakhir</th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                        ";
                              $halaman = 10;
                              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total,promojasa.kdpromo,promojasa.namapromo,promojasa.jenispromo,jasa.namajasa, jasa.hargajasa, promojasa.hargapromo,promojasa.tglmulai,promojasa.tglakhir FROM promojasa LEFT JOIN jasa ON promojasa.kdjasa=jasa.kdjasa ORDER BY kdpromo DESC"))['total'];
                              $pages=ceil($total/$halaman);
                              $tampil=mysqli_query($connect, "SELECT promojasa.kdpromo,promojasa.namapromo,jasa.namajasa,promojasa.jenispromo, jasa.hargajasa, promojasa.hargapromo,promojasa.tglmulai,promojasa.tglakhir FROM promojasa LEFT JOIN jasa ON promojasa.kdjasa=jasa.kdjasa ORDER BY kdpromo DESC LIMIT $mulai, $halaman"); 
                              $no = $mulai;
                              while ($data=mysqli_fetch_array($tampil)){
                              $no++;
                              $hargajasa=number_format($data['hargajasa'],2,",",".");
                              $hargapromo=number_format($data['hargapromo'],2,",",".");
                            
                              echo "
                                <tr>
                                  <th>$no</th>
                                  <th scope='row'>$data[kdpromo]</th>
                                  <td>$data[namapromo]</td>
                                  <td>$data[jenispromo]</td>
                                  <td>$data[namajasa]</td>
                                  <td>Rp. $hargajasa</td>
                                  <td>Rp. $hargapromo</td>
                                  <td>$data[tglmulai]</td>
                                  <td>$data[tglakhir]</td>
                                  <td>
                                    <a href='edit_promojasa.php?id=$data[kdpromo]'> <button class='btn btn-success'><svg-icon>Edit</button></a>
                                  </td>
                                  <td>
                                    <a href='includes/delete/delete_promobarang.php?id=$data[kdpromo]' onClick=\"return confirm('Anda yakin menghapus $data[namapromo]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
                                  </td>
                                </tr>";
                                  }
                            echo "</table>";
                        ?>
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
                    </div>
                </div>
            </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php include "template/footer.php"; ?>