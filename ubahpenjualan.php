<?php
include 'config.php';
$id=$_GET['id'];
$ambil=$connect->query("SELECT * FROM penjualan join obat on penjualan.id_obat=obat.id_obat WHERE id_penjualan='$id'");
$pecah = mysqli_fetch_array($ambil);
?>
<?php
if (isset($_POST['ubah']))
{
  $connect->query("UPDATE penjualan SET bulan='$_POST[bulan]', tahun='$_POST[tahun]', jumlah='$_POST[jumlah]' WHERE id_penjualan='$_GET[id]'");
  echo "<script>alert('Data Penjualan Telah Diubah');</script>";
  echo "<script>location='penjualan.php';</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Prediksi</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <?php include 'components/navtopbar.php'; ?>
        <!-- /. NAV TOP  -->
        <?php include 'components/sidebar.php'; ?>
        <!-- /. NAV SIDE  -->

        <!-- Begin Page Content -->
        <div id="page-wrapper">
            <div id="page-inner">
          <h1>Ubah Penjualan</h1>
          <form method="post">
              <div class="form-group">
                <label>Jenis Penjualan</label>
                <input disabled type="text" class="form-control" value="<?php echo $pecah['nama_obat'] ?>">
              </div>
              <div class="form-group">
                <label>Bulan</label>
                <input type="text" name="bulan" class="form-control" value="<?php echo $pecah['bulan']; ?>">
              </div>
              <div class="form-group">
                <label>Tahun</label>
                <input type="text" name="tahun" class="form-control" value="<?php echo $pecah['tahun']; ?>">
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="text" name="jumlah" class="form-control" value="<?php echo $pecah['jumlah']; ?>">
              </div>
              <a href="penjualan.php" class="btn btn-danger">Batal</a>
              <button class="btn btn-primary" name="ubah">Ubah</button>
            </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
</ul>
  <!-- Scroll to Top Button-->
    <?php include 'components/footer.php'; ?>
    <!-- /. FOOTER  -->

    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
