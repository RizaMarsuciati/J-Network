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
                            <strong class="card-title">Tampil Produk Barang</strong>
                        </div>
                        <?php
                        include ("../config/koneksi.php");
                        echo"
                        <div class='card-body'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th scope='col'>No</th>
                                        <th scope='col'>Kode Barang</th>
                                        <th scope='col'>Nama Barang</th>
                                        <th scope='col'>Kategori</th>
                                        <th scope='col'>Harga Jual</th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                        ";
                                          $halaman = 10;
                                          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                          $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                          $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total,produk.kdproduk,produk.namaproduk,kategori.namakategori, produk.hargaproduk FROM produk JOIN kategori ON produk.kdkategori=kategori.kdkategori ORDER BY kdproduk DESC"))['total'];
                                          $pages=ceil($total/$halaman);
                                          $tampil=mysqli_query($connect, "SELECT produk.kdproduk,produk.namaproduk,kategori.namakategori, produk.hargaproduk FROM produk JOIN kategori ON produk.kdkategori=kategori.kdkategori ORDER BY kdproduk DESC LIMIT $mulai, $halaman"); 
                                          $no = $mulai;
                                          while ($data=mysqli_fetch_array($tampil)){
                                          $no++;
                                          $hargaproduk=number_format($data['hargaproduk'],2,",",".");

                                    echo "
                                        <tr>
                                          <th>$no</th>
                                          <th scope='row'>$data[kdproduk]</th>
                                          <td>$data[namaproduk]</td>
                                          <td>$data[namakategori]</td>
                                          <td>Rp. $hargaproduk</td>
                                          <td>
                                            <a href='edit_barang.php?id=$data[kdproduk]'> <button class='btn btn-success'><svg-icon>Edit</button></a>
                                          </td>
                                          <td>
                                            <a href='includes/delete/delete_produk.php?id=$data[kdproduk]' onClick=\"return confirm('Anda yakin menghapus $data[namaproduk]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
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