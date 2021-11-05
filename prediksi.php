<?php
    include 'config.php';
    $ambil=$connect->query("SELECT * FROM obat");
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
        <div id="page-wrapper">
            <div id="page-inner">
                <center><h1>Halaman Prediksi</h1></center>
          <br>
          <form method="GET" action="perhitungan.php">
            <center>
              <table>
                <tr>
                  <td>Nama Obat :</td>
                  <td width="25"></td>
                  <td>
                      <select class="form-control" name="obat">
                        <option selected="selected">-Pilih Obat-</option>
                        <?php $ambil=$connect->query("SELECT * FROM obat"); ?>
                        <?php while($pecah = mysqli_fetch_array($ambil)){ ?>    
                        <option value="<?php echo $pecah['id_obat']; ?>"><?php echo $pecah['nama_obat'] ?></option>                            
                          <?php } ?>
                      </select>
                  </td>
                </tr>
              </table>
              <br>
              <button class="btn btn-success">HITUNG</button>
              <!-- <p align="center"><a href="prediksinext.php" class="btn btn-success btn-user">Lanjut Perhitungan</a></p> -->
            </center>
          </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

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
