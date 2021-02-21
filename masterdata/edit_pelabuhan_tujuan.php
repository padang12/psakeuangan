<?php 
$id = $_GET['id'];

$query = mysqli_query($koneksi,"SELECT * FROM tb_pelabuhan_tujuan where id='$id'");
$data = mysqli_fetch_array($query);

 ?>

<div class="">

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>EDIT PELABUHAN TUJUAN</h2>
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
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nama pelabuhan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="nama_pelabuhan" value="<?php echo $data['nama_pelabuhan'] ?>" required="" />
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
  $id = $_POST['id'];
  $nama_pelabuhan = $_POST['nama_pelabuhan'];

  $cekuraian    = mysqli_num_rows(mysqli_query($koneksi,"SELECT nama_pelabuhan FROM tb_pelabuhan_tujuan WHERE nama_pelabuhan='$nama_pelabuhan'"));

  if($cekuraian > 0) {
    echo '<SCRIPT> 
    alert("Maaf Data Uraian Sudah Ada");
    window.location.replace("dashboard.php?p=masterdata/pelabuhan_tujuan");
    </SCRIPT>';
  }

  else{
    mysqli_query($koneksi, "UPDATE tb_pelabuhan_tujuan set nama_pelabuhan='$nama_pelabuhan' where id='$id'");
    ?> 
    <SCRIPT> 
      alert('Berhasil Diedit');
      window.location.replace('dashboard.php?p=masterdata/pelabuhan_tujuan');
    </SCRIPT>
    <?php 
  }
} 
?>
