<!-- <?php error_reporting(0); ?> -->
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>LAPORAN BUKU BESAR</h2>
      <div class="clearfix"></div>
      <form method="post" class="nav navbar-right">
        <select class="select3" name="akun" style="font-size: 12px;">
          <option selected value="">-- Pilih Akun --</option>
          <?php 
          $data = mysqli_query($koneksi,"SELECT DISTINCT nama_akun FROM tb_jurnalumum");
          while($d = mysqli_fetch_array($data)){
            ?>
            <option value="<?php echo $d['nama_akun'];?>"><?php echo $d['nama_akun']; ?></option> 
          <?php } ?>
        </select>&nbsp
        <select class="select4" name="bulan" style="font-size: 12px;">
          <option selected value="">-- Pilih Bulan --</option>
          
          <option value="1">Januari</option>
          <option value="2">Februari</option>
          <option value="3">Maret</option>
          <option value="4">April</option>
          <option value="5">Mei</option>
          <option value="6">Juni</option>
          <option value="7">Juli</option>
          <option value="8">Agustus</option>
          <option value="9">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>&nbsp
        <select class="select4" name="tahun" style="font-size: 12px;">
          <!-- <option selected value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option> -->
          <?php
          $mulai= date('Y') - 50;
          for($i = $mulai;$i<$mulai + 100;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
          }
          ?>
        </select>&nbsp

        <button type='submit' name="submit" class="btn btn-success">Periode</button>
      </form>


      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead style="font-size: 12px;">
                <tr>
                  <th>No</th>
                  <th>Akun</th>
                  <th>Tanggal</th>
                  <th>Keterangan 1</th>
                  <th>Keterangan 2</th>
                  <th>Debit</th>
                  <th>Kredit</th>
                  <!-- <th>Saldo</th> -->
                </tr>
              </thead>
              <tbody style="font-size: 12px;">
                <?php 
                if (isset($_POST['submit'])) {
                  $no = 2;
                  $akn = $_POST['akun'];
                  $bln = $_POST['bulan'];
                  $thn = $_POST['tahun'];
                  $sldawal = $bln - 1;
                  $data = mysqli_query($koneksi,"SELECT * FROM tb_jurnalumum WHERE MONTH(tgl_jurnal) = '$bln' AND YEAR(tgl_jurnal) = '$thn' AND nama_akun='$akn' ORDER BY tgl_jurnal DESC");
                  $data1 = mysqli_query($koneksi,"SELECT * FROM tb_jurnalumum WHERE MONTH(tgl_jurnal) = '$sldawal' AND YEAR(tgl_jurnal) = '$thn' AND nama_akun='$akn' ORDER BY tgl_jurnal DESC");
                }

                ?>
                <?php 
                while($d1 = mysqli_fetch_array($data1)){
                  $deb = $d1['debet'];
                  $krd = $d1['kredit'];

                  $sldd += $deb;
                  $sldk += $krd;
                  $saldoawal = $sldd - $sldk;
                }
                ?><tr>
                  <td><?php echo "1"; ?></td>
                  <td><?php echo "Saldo awal"; ?></td>
                  <td><?php echo "Saldo awal"; ?></td>
                  <td><?php echo "Saldo awal"; ?></td>
                  <td><?php echo "Saldo awal"; ?></td>
                  <td><?php echo "Rp " . number_format($saldoawal, 0, ",", "."); ?></td>
                  <td><?php echo "Rp " . number_format("-", 0, ",", "."); ?></td>
                </tr>
                <?php 
                while($d = mysqli_fetch_array($data)){
                 $deb1 = $d['debet'];
                 $krd1 = $d['kredit'];

                 $sldd1 += $deb1;
                 $sldk1 += $krd1;
                 $saldoakhir1 = $sldd1 - $sldk1;
                 $totd = $saldoawal + $sldd1;
                 $sa = $totd - $sldk1;

                 ?>
                 <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['nama_akun']; ?></td>
                  <td><?php echo $d['tgl_jurnal']; ?></td>
                  <td><?php echo $d['ket1']; ?></td>
                  <td><?php echo $d['ket2']; ?></td>
                  <td><?php echo "Rp " . number_format($d['debet'], 0, ",", "."); ?></td>
                  <td><?php echo "Rp " . number_format($d['kredit'], 0, ",", "."); ?></td>
                  <!-- <td><?php echo "Rp " . number_format($temp, 0, ",", "."); ?></td> -->

                </tr>
              <?php }?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5"><b>Saldo Akhir : <?php echo "Rp " . number_format( $sa, 0, ",", "."); ?></b></td>
               
                <td ><?php echo "Rp " . number_format( $totd, 0, ",", "."); ?></td>
                <td ><?php echo "Rp " . number_format( $sldk1, 0, ",", "."); ?></td>
              
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>
  </div>
</div>
</div>