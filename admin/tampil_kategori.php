<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>


    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "template/menuheader.php"; ?>
        <!-- Header-->
        
    <div class="content">
        <div class="animated fadeIn">
            <div class="container-fluid" style='margin: 0 auto; font-size: 14px; border-radius: 10px; padding-left: 20%; padding-right: 20%;'>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tampil Kategori Barang</strong>
                        </div>
                        <?php
                        include ("../config/koneksi.php");
                        echo"
                        <div class='card-body'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th scope='col'>No</th>
                                        <th scope='col'>Kode Kategori</th>
                                        <th scope='col'>Nama Kategori</th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                                ";
                                          $halaman = 10;
                                          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                          $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                          $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total,kdkategori,namakategori FROM kategori ORDER BY kdkategori DESC"))['total'];
                                          $pages=ceil($total/$halaman);
                                          $tampil=mysqli_query($connect, "SELECT * FROM kategori ORDER BY kdkategori DESC LIMIT $mulai, $halaman"); 
                                          $no = $mulai;
                                          while ($data=mysqli_fetch_array($tampil)){
                                          $no++;

                                    echo "
                                        <tr>
                                          <th>$no</th>
                                          <th scope='row'>$data[kdkategori]</th>
                                          <td>$data[namakategori]</td>
                                          <td>
                                            <a href='edit_kategori.php?id=$data[kdkategori]'> <button class='btn btn-success'><svg-icon>Edit</button></a>
                                          </td>
                                          <td>
                                            <a href='includes/delete/delete_kategori.php?id=$data[kdkategori]' onClick=\"return confirm('Anda yakin menghapus $data[namakategori]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
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