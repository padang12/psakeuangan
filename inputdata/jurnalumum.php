<?php 
error_reporting(0);
// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no) as kodeTerbesar FROM tb_asettetap");
$data = mysqli_fetch_array($query);
$No = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($No, 1, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
$date=date('Y');
$huruf = "/JNRL/PSA-KTP/$date";
$No = sprintf("%03s", $urutan) . $huruf;
?>
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Input</button> Jurnal Umum</h2>
       <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Akun</th>
                  <th>Keterangan 1</th>
                  <th>Keterangan 2</th>
                  <th>Debit</th>
                  <th>Kredit</th>
                  <th>Sumber</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               $no = 1;
               $data = mysqli_query($koneksi,"select * from tb_jurnalumum");

               while($d = mysqli_fetch_array($data)){
                ?>
                <tr>

                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['tgl_jurnal']; ?></td>
                  <td><?php echo $d['nama_akun']; ?></td>
                  <td><?php echo $d['ket1']; ?></td>
                  <td><?php echo $d['ket2']; ?></td>
                  <td>
                    <?php
                    if ($d['debet'] == 0) {
                     echo "-";
                   }else{
                    echo $d['debet'];
                  }                     
                  ?>

                </td>
                <td>
                  <?php
                  if ($d['kredit'] == 0) {
                   echo "-";
                 }else{
                  echo $d['kredit'];
                }                     
                ?>
              </td>
              <td><?php echo $d['sumber']; ?></td>

              <td>
                <?php 
                $smb = $d['sumber'];
                if ($smb == "Jurnal Umum") {
                ?>
                  <a href="?p=inputdata/inacktivejurnal&no=<?php echo $d['id_jurnal']; ?>"><i class="fa fa-trash"></i> Inactive </a>
                <?php 
              }else{
                echo " - ";
              }
                 ?>
                </td>

              </tr>
            <?php } ?>
          </tbody>
        </table>


      </div>
    </div>
  </div>
</div>
</div>
</div>
<form method="POST">
  <div class="modal fade bs-example-modal-lg" style="overflow:hidden;" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Form Jurnal Umum</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">ID Jurnal<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
             <input type="text" required="" name="no" class="form-control" readonly value="<?php echo $No; ?>">

           </div>
         </div>
         <div class="field item form-group">
          <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6">
           <input class="form-control" type="date" required="" name="tgl" required="" />
         </div>
       </div>
       <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Akun Debit<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
         <select class="select2 form-control" required="" name="akundebet">
          <option>-- Pilih Akun --</option> 
          <?php 
          $data = mysqli_query($koneksi,"SELECT * FROM tb_coa");
          while($d = mysqli_fetch_array($data)){
            ?>
            <option value="<?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?>"><?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?></option> 
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Akun Kredit<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6">
       <select class="select2 form-control" required="" name="akunkredit">
        <option>-- Pilih Akun --</option> 
        <?php 
        $data = mysqli_query($koneksi,"SELECT * FROM tb_coa");
        while($d = mysqli_fetch_array($data)){
          ?>
          <option value="<?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?>"><?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?></option> 
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan 1<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
      <input class="form-control" type="text" required="" name="ket1" required="" />
    </div>
  </div>
  <div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan 2<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
      <input class="form-control" type="text" required="" name="ket2" required="" />
    </div>
  </div>
  <div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Nilai<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
      <input class="form-control" type="number" required="" name="nilai" required="" />
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>

</div>
</div>
</div>
</form>
<?php 

if(isset($_POST['submit'])) {
  $no = $_POST['no'];
  $tgl = $_POST['tgl'];
  $deb = $_POST['akundebet'];
  $krd = $_POST['akunkredit'];
  $ket1 = $_POST['ket1'];
  $ket2 = $_POST['ket2'];
  $nilai = $_POST['nilai'];

  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('$no','$tgl','$deb','$ket1','$ket2','$nilai','','Jurnal Umum')");
  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('$no','$tgl','$krd','$ket1','$ket2','','$nilai','Jurnal Umum')");

  ?> 
  <SCRIPT> 
    alert('Input Success');
    window.location.replace('index.php?p=inputdata/jurnalumum');
  </SCRIPT>
  <?php } ?>