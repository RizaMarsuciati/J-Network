<table class="table" border=>
                                           
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">no</th>
                                                    <th class="border-0">kode</th>
                                                    <th class="border-0">nama</th>
                                                    <th class="border-0">tanggal mulai</th>
                                                    <th class="border-0">tanggal akhir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    require "config/koneksi.php";
                                                    $no = 1;
                                                    $data = mysqli_query($connect, "SELECT promo.kdpromo,promo.namapromo,promo.tglmulai,promo.tglakhir FROM promo");
                                                    while($isi = mysqli_fetch_array($data))
                                                    {
                                                ?>
                                                <?php
                                                if(!(strtotime($isi['tglmulai'])<=time()AND time()>=strtotime($isi['tglakhir'])))
                                                {
                                                ?>
                                                <tr>
                                                     <td><?php echo $no; ?></td>
                                                    <td><?php echo $isi['kdpromo']; ?></td>
                                                    <td><?php echo $isi['namapromo']; ?></td>
                                                    <td><?php echo $isi['tglmulai']; ?></td>
                                                    <td><?php echo $isi['tglakhir']; ?></td>
                                                    
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>