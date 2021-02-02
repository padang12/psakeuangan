<?php 
error_reporting(0);
// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_invoice) as kodeTerbesar FROM tb_pen_ket_cust");
$data = mysqli_fetch_array($query);
$No_invoice = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($No_invoice, 1, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
 $date=date('Y');
$huruf = "/INV/PSA-KTP/$date";
$No_invoice = sprintf("%03s", $urutan) . $huruf;
?>
 <div class="row">
     <div class="col-md-12 ">
        <div class="x_panel ">
           <div class="x_title">
              <h2>PENDAPATAN</h2>
              <div class="clearfix"></div>
           </div>
           <div class="x_content">
              <br />
              <form class="form-label-left input_mask" method="post">
                 <div class="form-group row">
                    <label class="col-form-label col-md-2">No. Invoice :</label>
                    <div class="col-md-4 col-sm-4 ">
                       <input type="text" name="no_invoice" class="form-control" placeholder="000/AA/0000" value="<?php echo $No_invoice; ?>" readonly>
                    </div>
                    <label class="col-form-label col-md-1">Tanggal :</label>
                    <div class="col-md-5 col-sm-5 ">
                       <input type="date" name="tanggal" class="form-control" required="">
                    </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-form-label col-md-2">Kode Customer :</label>
                    <div class="col-md-4 col-sm-4 ">
                       <select class="select2 form-control" name="kode_customer" onchange="changeValue(this.value)" required="">
                          <option value="">-- Pilih Akun --</option>
                          <?php 
                             $sql=mysqli_query($koneksi, "SELECT * FROM tb_customer");
                               $jsArray = "var prdName = new Array();\n";
                               while ($t=mysqli_fetch_array($sql)) {
                              
                                echo '<option value="'.$t['no_customer'].'">'.$t['no_customer']." - ".$t['nama_customer'].'</option> ';
                                $jsArray .= "prdName['" . $t['no_customer'] . "'] = {alamat:'" . addslashes($t['alamat1'] ) . "'};\n";
                              
                               }


                             ?>
                       </select>
                    </div>
                    <label for="" class="col-form-label col-md-1">Keterangan</label>
                    <div class="col-md-5 col-sm-5">
                      <input type="text" name="keterangan" class="form-control" placeholder="Keterangan Boleh Kososng">
                    </div>
                 </div>
                 <div class="form-group row">
                 </div>
                 <div class="form-group row">
                    <label class="col-form-label col-md-2">Alamat :</label>
                    <div class="col-md-4 col-sm-4 ">
                       <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat" readonly></textarea>
                    </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-form-label col-md-2">Nama Kapal :</label>
                    <div class="col-md-4 col-sm-4 ">
                       <input type="text" class="form-control" name="nama_kapal" placeholder="Nama Kapal" required="">
                    </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-form-label col-md-2">Pelabuhan Asal :</label>
                    <div class="col-md-4 col-sm-4 ">
                       <input type="text" class="form-control" placeholder="Pelabuhan Asal" name="pelabuhan_asal" required="">
                    </div>
                    <label class="col-form-label col-md-2">Pelabuhan Tujuan :</label>
                    <div class="col-md-4 col-sm-4 ">
                       <input type="text" class="form-control" name="pelabuhan_tujuan" placeholder="Pelabuhan Tujuan" required="">
                    </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-form-label col-md-2">Tanggal Tiba :</label>
                    <div class="col-md-4 col-sm-4 ">
                       <input type="date" name="tanggal_tiba" class="form-control" required="">
                    </div>
                    <label class="col-form-label col-md-2">Tanggal Berangkat :</label>
                    <div class="col-md-4 col-sm-4 ">
                       <input type="date" name="tanggal_berangkat" class="form-control" required="">
                    </div>
                 </div>
                 <div class="ln_solid"></div>
                 <div class="form-group row">
                    <div class="col-md-9 col-sm-9  offset-md-0">
                       <button type='submit' name="submit" class="btn btn-success">Lanjutkan <i class="fa fa-angle-double-right"></i></button>
                    </div>
                 </div>
              </form>
           </div>
        </div>
     </div>
   </div>
  <script type="text/javascript">    
      <?php echo $jsArray; ?>  
      function changeValue(x){  
      document.getElementById('alamat').value = prdName[x].alamat;   
      };  
  </script>

  
 



<?php 
   if(isset($_POST['submit'])) {
     $no_invoice = $_POST['no_invoice'];
     $kode_customer = $_POST['kode_customer'];
     $alamat = $_POST['alamat'];
     $nama_kapal = $_POST['nama_kapal'];
     $pelabuhan_asal = $_POST['pelabuhan_asal'];
     $tanggal_tiba = $_POST['tanggal_tiba'];
     $tanggal = $_POST['tanggal'];
     $pelabuhan_tujuan = $_POST['pelabuhan_asal'];
     $tanggal_berangkat = $_POST['tanggal_berangkat'];
    $keterangan = $_POST['keterangan'];
     // Insert user data into table
     mysqli_query($koneksi, "INSERT INTO   tb_pen_ket_cust VALUES('$no_invoice','$kode_customer','$alamat','$nama_kapal','$pelabuhan_asal','$tanggal_tiba','$tanggal','$pelabuhan_tujuan','$tanggal_berangkat','$keterangan')");

   ?> <SCRIPT> //not showing me this
   alert('Input Success');
   window.location.replace('dashboard.php?p=inputdata/lanjutan_pendapatan&invoice=<?php echo $no_invoice ?>&kode_customer=<?php echo $kode_customer ?>');
</SCRIPT>
<?php
   }
   
    ?>