<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>



    <!-- Right Panel --> 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "template/menuheader.php"; ?>
        <!-- Header-->


        <div class="content pb-0">

            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7f-box"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 

                                <?php
                                include ("../config/koneksi.php");
                                $tampil=mysqli_query($connect, "SELECT count(kdproduk) AS jumlahbarang FROM produk"); 
                                $data=mysqli_fetch_array($tampil);

                            echo "

                                        <div class='stat-text'><span class='count'>$data[jumlahbarang]</span></div>
                                        <div class='stat-heading'>Jumlah Barang</div>
                                        ";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7f-tools"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                <?php
                                include ("../config/koneksi.php");
                                $tampil=mysqli_query($connect, "SELECT count(kdjasa) AS jumlahjasa FROM jasa"); 
                                $data=mysqli_fetch_array($tampil);

                                echo " 
                                        <div class='stat-text'><span class='count'>$data[jumlahjasa]</span></div>
                                        <div class='stat-heading'>Jumlah <br>Jasa</div>
                                        ";
                                        ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7f-network"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                <?php
                                include ("../config/koneksi.php");
                                $tampil=mysqli_query($connect, "SELECT count(kdkategori) AS jumlahkategori FROM kategori"); 
                                $data=mysqli_fetch_array($tampil);

                                echo " 
                                        <div class='stat-text'><span class='count'>$data[jumlahkategori]</span></div>
                                        <div class='stat-heading'>Jumlah Kategori</div>
                                        ";
                                        ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7f-gleam"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                <?php
                                include ("../config/koneksi.php");
                                $tampil=mysqli_query($connect, "SELECT count(kdpromo) AS jumlahpromo FROM promo WHERE tglmulai<=now()AND now()>=tglakhir"); 
                                $data=mysqli_fetch_array($tampil);

                                echo " 
                                        <div class='stat-text'><span class='count'>$data[jumlahpromo]</span></div>
                                        <div class='stat-heading'>Jumlah Promo Aktif</div>
                                        ";
                                        ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Widgets End -->

            <div class="clearfix"></div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-8"> 
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Promo saat ini </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">No</th>
                                                <th class="avatar">Gambar</th>
                                              
                                                <th>Nama Promo</th>
                                                <th>Nama Barang</th>
                                                <th>Berakhir</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            
                                            <?php
                                              $no=0;
                                              require "../config/koneksi.php";
                                              $tampil = mysqli_query($connect, "SELECT promo.kdpromo, promo.harga, promo.hargapromo,promo.tglakhir, promo.gambar,produk.namaproduk, promo.namapromo,promo.tglmulai,promo.tglakhir FROM promo JOIN produk ON promo.kdproduk=produk.kdproduk  ORDER BY kdpromo DESC LIMIT 4");
                                              while($data = mysqli_fetch_array($tampil))
                                            {
                                              $no++;
                                               if(!(strtotime($data['tglmulai'])<=time()AND time()>=strtotime($data['tglakhir'])))
                                                { 

                                            ?>

                                            <tr>
                                                <td class="serial"><?php echo $no; ?>.</td>
                                                <td class="avatar">
                                                    <div class="round-img">
                                                        <a href="#"><img class="rounded-square" src="<?php echo "assets/img/uploads/promo/" .$data['gambar']; ?>" alt=""></a>
                                                    </div>
                                                </td>
                                              
                                                <td>  <span class="name"><?php echo $data['namapromo']; ?></span> </td> 
                                                <td> <span class="product"><?php echo $data['namaproduk']; ?></span> </td>
                                                <td><span class="name"><?php echo $data['tglakhir']; ?></span></td>
                                              </tr>
                                                <?php
                                            
                                             }
                                                }
                                                ?>
                                            
                                           
                                          
                                           
                                            
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->


                    <div class="col-xl-4">
                        <div class="row"> 

                            <div class="col-lg-6 col-xl-12">
                                <div class="card">
                                    <div class="card-body">  
                                        <!-- <h4 class="box-title">Chandler</h4> -->
                                        <div class="calender-cont widget-calender">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div><!-- /.card -->
                            </div>
                        </div>
                    </div> <!-- /.col-md-4 -->

                     <div class="col-xl-8"> 
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Promo saat ini </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">No</th>
                                                <th class="avatar">Gambar</th>
                                              
                                                <th>Nama Promo</th>
                                                <th>Nama Barang</th>
                                                <th>Berakhir</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            
                                            <?php
                                              $no=0;
                                              require "../config/koneksi.php";
                                              $tampil = mysqli_query($connect, "SELECT promojasa.kdpromo, promojasa.harga, promojasa.hargapromo, promojasa.gambar,jasa.namajasa, promojasa.namapromo,promojasa.tglmulai,promojasa.tglakhir FROM promojasa LEFT JOIN jasa ON promojasa.kdjasa=jasa.kdjasa  ORDER BY kdpromo DESC LIMIT 4");
                                              while($data = mysqli_fetch_array($tampil))
                                            {
                                              $no++;
                                               if(!(strtotime($data['tglmulai'])<=time()AND time()>=strtotime($data['tglakhir'])))
                                                { 

                                            ?>

                                            <tr>
                                                <td class="serial"><?php echo $no; ?>.</td>
                                                <td class="avatar">
                                                    <div class="round-img">
                                                        <a href="#"><img class="rounded-square" src="<?php echo "/assets/img/uploads/promo/" .$data['gambar']; ?>" alt=""></a>
                                                    </div>
                                                </td>
                                              
                                                <td>  <span class="name"><?php echo $data['namapromo']; ?></span> </td> 
                                                <td> <span class="product"><?php echo $data['namajasa']; ?></span> </td>
                                                <td><span class="name"><?php echo $data['tglakhir']; ?></span></td>
                                              </tr>
                                                <?php
                                            
                                             }
                                                }
                                                ?>
                                            
                                           
                                          
                                           
                                            
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->
                </div> 
            </div> <!-- /.order -->

            <div class="modal fade none-border" id="event-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add New Event</strong></h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Add Category -->
            <div class="modal fade none-border" id="add-category">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add a category </strong></h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Category Name</label>
                                        <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Choose Category Color</label>
                                        <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                            <option value="success">Success</option>
                                            <option value="danger">Danger</option>
                                            <option value="info">Info</option>
                                            <option value="pink">Pink</option>
                                            <option value="primary">Primary</option>
                                            <option value="warning">Warning</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->



            







 





        </div> <!-- .content -->



<?php include "template/footer.php"; ?>