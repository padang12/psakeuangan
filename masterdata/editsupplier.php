
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
          <form method="post">
            <?php 
            $no = $_GET["no"];
            $data = mysqli_query($koneksi,"SELECT * FROM tb_supplier WHERE no_supplier='$no'");
            while($d = mysqli_fetch_array($data)){
              ?>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">No Costomer<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" name="no_cust" value="<?php echo $d['no_supplier']; ?>" readonly />
                </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Costomer<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" name="nm_cust" value="<?php echo $d['nama_supplier']; ?>" required="" />
                </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat 1<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <textarea class="form-control" name="almt1" required=""><?php echo $d['alamat1']; ?></textarea>
                </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat 2<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <textarea class="form-control" name="almt2" required=""><?php echo $d['alamat2']; ?></textarea>
                </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat 3<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <textarea class="form-control" name="almt3" required=""><?php echo $d['alamat3']; ?></textarea>
                </div>
              </div>
              
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Telpon<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" name="tlpn" value="<?php echo $d['tlpn']; ?>" required="" />
                </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">PIC<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" name="pic" value="<?php echo $d['pic']; ?>" required="" />
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
  $no = $_POST['no_cust'];
  $nm = $_POST['nm_cust'];
  $almt1 = $_POST['almt1'];
  $almt2 = $_POST['almt2'];
  $almt3 = $_POST['almt3'];
  $tlpn = $_POST['tlpn'];
  $pic = $_POST['pic'];
  $bantuan = $_POST['bantuan'];
  // Insert user data into table
  mysqli_query($koneksi, "UPDATE tb_supplier SET nama_supplier='$nm', alamat1='$almt1', alamat2='$almt2', alamat3='$almt3', tlpn='$tlpn', pic='$pic', bantuan='$bantuan' WHERE no_supplier='$no'");

?> <SCRIPT> //not showing me this
alert('Edit Success');
window.location.replace('dashboard.php?p=masterdata/supplier');
</SCRIPT><?php


}
?>
