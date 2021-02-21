
<div class="">

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>INPUT URAIAN PENDAPATAN</h2>
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

            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Akun<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="nama_uraian" required="" />
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
</div>


<?php 

if(isset($_POST['submit'])) {

  $nama_uraian = $_POST['nama_uraian'];

  $cekuraian    = mysqli_num_rows(mysqli_query($koneksi,"SELECT nama_uraian FROM tb_uraian WHERE nama_uraian='$nama_uraian'"));

  if($cekuraian > 0) {
    echo '<SCRIPT> 
    alert("Maaf Data Uraian Sudah Ada");
    window.location.replace("dashboard.php?p=masterdata/uraian");
    </SCRIPT>';
  }

  else{
    mysqli_query($koneksi, "INSERT INTO tb_uraian VALUES('','$nama_uraian')");
        //query insert dijalankan
    ?> 
    <SCRIPT> 
      alert('Input Success');
      window.location.replace('dashboard.php?p=masterdata/uraian');
    </SCRIPT>
    <?php 
  }
} 
?>
