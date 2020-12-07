<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>LAPORAN ASET TETAP
        <?php 
        if(isset($_POST['periode'])){

         $per = $_POST['periode'];
         echo " - Periode : " . $per;
       }
      
      ?>
    </h2>
    <ul class="nav navbar-right panel_toolbox">
        <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li> -->

        <li>

          <form method="post">
            <input type="date" name="periode">
            <input type="submit" value="Periode">
          </form>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">

              <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead style="font-size: 12px;">
                <tr>
                  <th>No</th>
                  <th>Akun</th>
                  <th>Deskripsi</th>
                  <th>Tanggal<br>
                    Perolehan
                  </th>
                  <th>Kelompok</th>
                  <th>Umur Ekonomis (Tahun)
                  </th>
                  <th>Umur Ekonomis (Bulan) </th>
                  <th>Harga Perolehan </th>
                  <th>Umur Aset </th>
                  <th>Penyusutan Bulan Berjalan
                  </th>
                  <th>Akumulasi Penyusutan Bulan Berjalan
                  </th>
                  <th>Nilai Buku Bulan Berjalan
                  </th>
                  <!--  <th>Action</th> -->
                </tr>
              </thead>
              <tbody style="font-size: 12px;">
               <?php 
               if(isset($_POST['periode'])){

                 $per = $_POST['periode'];
               }else{
                $per = date('Y-m-d');
              }

              $no = 1;
              $data = mysqli_query($koneksi,"select * from tb_asettetap");
              while($d = mysqli_fetch_array($data)){

                $umrt = $d['umur_ekonomis'];
                $umrb = $umrt * 12;

                $tanggal = new DateTime($d['tgl']);
                $today = new DateTime($per);
                $y = $today->diff($tanggal)->y;
                $m = $today->diff($tanggal)->m;
                $days = $today->diff($tanggal)->d;
                $jml_bulan = $y*12;
                $umrast = $jml_bulan + $m;
                // echo "Total Bulan: " . $totbulan . " bulan ";
                // echo "Umur: " . $y . " tahun " . $m . " bulan " . $days . " hari";
                $hrg = $d['nilai'] ;

                if ($umrast <= $umrb) {
                 $penyusutan = @ ($hrg / $umrb);
               }else{
                $penyusutan = 0;
              }

              $apbb = @ ($umrast * $hrg / $umrb);

              if ($umrast <= $umrb) {
               $nb3 = $hrg - $penyusutan - $apbb;
             }else{
              $nb3 = 0;
            }

            $gtpenyusutan += $penyusutan;
            $gthrg += $hrg;
            $gtpbb += $apbb;
            $gtnb3 += $nb3;

            ?>
            <tr>

              <td><?php echo $no++; ?></td>
              <td><?php echo $d['tipe_aset']; ?></td>
              <td><?php echo $d['nama_aset']; ?></td>
              <td><?php echo $d['tgl']; ?></td>
              <td><?php echo $d['kelompok']; ?></td>
              <td><?php echo $umrt; ?> Tahun</td>
              <td><?php echo $umrb; ?> Bulan</td>
              <td><?php echo "Rp " . number_format($hrg, 0, ",", "."); ?></td>

              <td><?php echo $umrast; ?> Bulan</td>
              <td>
                <?php
                if ($penyusutan == 0) {
                  echo "-";
                }else{
                  echo "Rp " . number_format($penyusutan, 0, ",", ".");
                }

                ?>

              </td>
              <td><?php echo "Rp " . number_format($apbb, 0, ",", "."); ?></td>
              <td>
                <?php
                 if ($nb3 == 0) {
                  echo "-";
                }else{
                  echo "Rp " . number_format($nb3, 0, ",", ".");
                }
                 ?>
                
              </td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
            <tr>
              <td colspan="7">Grand Total</td>
              <td ><?php echo "Rp " . number_format($gthrg, 0, ",", "."); ?></td>
              <td></td>
              <td ><?php echo "Rp " . number_format($gtpenyusutan, 0, ",", "."); ?></td>
              <td ><?php echo "Rp " . number_format($gtpbb, 0, ",", "."); ?></td>
              <td ><?php echo "Rp " . number_format($gtnb3, 0, ",", "."); ?></td>
            </tr>
          </tfoot>
      </table>


    </div>
  </div>
</div>
</div>
</div>
</div>