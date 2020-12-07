
<div class="">

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>EDIT CHART OF ACCOUNT</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form method="post">
           <?php 
           $no = $_GET["no"];
           $data = mysqli_query($koneksi,"SELECT * FROM tb_coa WHERE no_akun='$no' ");
           while($d = mysqli_fetch_array($data)){
            ?>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">No Akun<span
                class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" name="noakun" value="<?php echo $d['no_akun']; ?>" required="" readonly />
                </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Akun<span
                  class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" name="nm_akun" value="<?php echo $d['nama_akun']; ?>" required="" />
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Saldo Normal<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" value="<?php echo $d['saldo_normal']; ?>" name="saldo" required="" />
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Laporan<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" value="<?php echo $d['laporan']; ?>" name="lap" required="" />
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori 1<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" value="<?php echo $d['kat1']; ?>" name="kategori1" required="" />
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori 2<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" value="<?php echo $d['kat2']; ?>" name="kategori2" required="" />
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori 3<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" value="<?php echo $d['kat3']; ?>" name="kategori3" required="" />
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
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php 

  if(isset($_POST['submit'])) {
    $no = $_POST['noakun'];
    $nm = $_POST['nm_akun'];
    $sldo = $_POST['saldo'];
    $lap = $_POST['lap'];
    $kat1 = $_POST['kategori1'];
    $kat2 = $_POST['kategori2'];
    $kat3 = $_POST['kategori3'];
  // Insert user data into table
    mysqli_query($koneksi, "UPDATE tb_coa SET nama_akun='$nm',saldo_normal='$sldo',laporan='$lap',kat1='$kat1',kat2='$kat2',kat3='$kat3' WHERE no_akun='$no'");

?> <SCRIPT> //not showing me this
alert('Edit Success');
window.location.replace('index.php?p=masterdata/coa');
</SCRIPT><?php


}
?>
