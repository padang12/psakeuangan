<?php


error_reporting(0);
// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_customer) as kodeTerbesar FROM tb_customer");
$data = mysqli_fetch_array($query);
$No_cos = $data['kodeTerbesar'];


// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($No_cos, 2, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
$date=date('Y');
$huruf = "C-";
$No_cos =$huruf . sprintf("%03s", $urutan);
?>

<div class="">

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>INPUT CUSTOMER</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form method="post" action="">

            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">No Costomer<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" value="<?php echo $No_cos ?>" readonly type="text" name="no_cust" required="" />
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Costomer<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="nm_cust" required="" />
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat 1<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <textarea class="form-control" name="almt1" required=""></textarea>
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat 2<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <textarea class="form-control" name="almt2" required=""></textarea>
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat 3<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <textarea class="form-control" name="almt3" required=""></textarea>
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Pos<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="pos" required="" />
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Telpon<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="tlpn" required="" />
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">PIC<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="pic" required="" />
              </div>
            </div>
            <div class="ln_solid">
              <br>
              <div class="form-group">
                <div class="col-md-6 offset-md-3">
                  <button type='submit' name="submit" class="btn btn-primary">Submit</button>

                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 

if(isset($_POST['submit'])) {
  $no = $_POST['no_cust'];
  $nm = $_POST['nm_cust'];
  $almt1 = $_POST['almt1'];
  $almt2 = $_POST['almt2'];
  $almt3 = $_POST['almt3'];
  $pos = $_POST['pos'];
  $tlpn = $_POST['tlpn'];
  $pic = $_POST['pic'];
  
  // Insert user data into table
  mysqli_query($koneksi, "INSERT INTO tb_customer VALUES('$no','$nm','$almt1','$almt2','$almt3','$pos','$tlpn','$pic')");

?>
<SCRIPT> 
alert('Input Success');
window.location.replace('dashboard.php?p=masterdata/customer');
</SCRIPT><?php } ?>
