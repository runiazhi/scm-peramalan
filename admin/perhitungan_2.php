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
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">APLIKASI</a>
            </div>

            <div class="header-right">
                <div class="inner-text">
                    Selamat Datang Admin :)<br />
                Aplikasi Prediksi Penjualan</div>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/sarjana.png" class="img-thumbnail" />

                            <div class="inner-text">
                                Selamat Datang
                            <br />
                                <small>Muhammad Hisbullah Al-Faiqoh </small>
                            </div>
                        </div>
                    </li>
                    <li><a href="dasboard.php"><i class="fa fa-dashboard "></i>Home</a></li>
                    <li><a href="profil.php"><i class="fa fa-desktop "></i>Profil</a></li>
                    <li><a href="barang.php"><i class="fa fa-edit "></i>Data Barang </a></li>
                    <li><a href="penjualan.php"><i class="fa fa-bars "></i>Data Penjualan </a></li>
                    <li><a class="active-menu" href="prediksi.php"><i class="fa fa-flask "></i>Prediksi</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out "></i>Log Out</a></li>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
              <?php
                    
                    $connect = mysqli_connect("localhost","root","","prediksi");

                    $data = $_GET['barang'];
                    //perhitungan
                    $ambil = mysqli_query($connect, "SELECT * FROM penjualan WHERE id_barang='$data' ");
                    $count = 0;
                    while($pecah = mysqli_fetch_array($ambil))
                    {
                        if ($count == 3)
                        $count = 0; 
                        $days[$count]=$pecah['jumlah'];
                        $total = array_sum($days);
                        $x = 0;
                        $jumlah_z = 0;
                        $jumlah_x = 0;
                        $jumlah_y = 0;
                            $jumlah_z = $x;  
                            $jumlah_x = $pecah['jumlah'] - $pecah['average'];
                            $jumlah_y = ($x * $x);
                            $res = $total/count($days);
                            $count++;

                    }
                for ($i=4; $i<count($res); $i++) {
                    echo $res['$i']."<br>";
                }
                                ?>
                            <?php
                          $Bulan = "Januari";
                          $tahun = date('Y');
                          ?>
                    
        <center><h1>Hasil Prediksi</h1>
        <h1 class="judul">Single Moving Average</h1></center>
        <div class="container-table100">
          <br>
            <center>
              <table class="table table-bordered">
             <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Bulan </th>
                  <th>Tahun </th>
                  <th>Jumlah </th>
                    <th>Average</th>
                    <th>error(omset-forecast)</th>
                          <th>(omset-forecast)2</th>
                </tr>
                <?php $nomor=1; ?>
                <?php $dapat = mysqli_query($connect, "SELECT * FROM penjualan WHERE id_barang='$data' "); ?>
                <?php while($pecah = mysqli_fetch_array($dapat)){ ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['bulan'] ?></td>
                    <td><?php echo $pecah['tahun'] ?></td>
                    <td align="center"><?php echo $pecah['jumlah'] ?></td>
                    <td align="center"><?php echo $pecah['average'] ?></td>
                  <td align="center"><?=$pecah['jumlah'] - $pecah['average'];?></td>
                  <td align="center"><?=pow($jumlah_x, 2);?></td>
                </tr>
            </thead>
                <?php $nomor++; ?>
                <?php } ?>
                <tr>
  <td align="center" colspan="2"><?php echo $Bulan ?></td>
          <td align="center"><?php echo $tahun ?></td>
          <td></td>
          <td align="center">
            <?php
            echo $res;
            ?>
         <td colspan="2">
        </tr>

        <tr>
          <td align="center" colspan="2">Jumlah</td>
          <td colspan="4">
          <td align="center"><?php echo $jumlah_y; ?></td>
        </tr>
        
      <tr>
        <td align="center" colspan="2">RMSE</td>

        <td align="center" colspan="5">
          <?php
          $RMSE = sqrt($jumlah_y) / $x;
          echo $RMSE;
          ?>
        </td>
      </tr>
              </table>
            </center>
            <table border="1" width="450">
  Hasil
  <thead>
    <tr>
      <td align="center">Peramalan untuk Bulan <?=$Bulan?> <?=$tahun?> adalah</td><td align="center"><?=$res?></td>
    </tr>
     <tr>
      <td align="center">Nilai kesalahan perhitungan (RMSE) adalah</td><td align="center"><?=$RMSE?></td>
    </tr>
  </thead>
 </table>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
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
