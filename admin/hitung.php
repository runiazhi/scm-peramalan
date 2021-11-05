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
                    <li><a href="admin.php"><i class="fa fa-desktop "></i>Admin</a></li>
                    <li><a href="barang.php"><i class="fa fa-edit "></i>Data Barang </a></li>
                    <li><a href="penjualan.php"><i class="fa fa-bars "></i>Data Penjualan </a></li>
                    <li><a class="active-menu" href="prediksi.php"><i class="fa fa-flask "></i>Prediksi</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out "></i>Log Out</a></li>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
               <h3><span class="fa fa-send"></span> Hasil Prediksi</h3>
            <br/>
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>no.</th>
                    <th>bulan</th>
                    <th>tahun</th>
                    <th align="center">data penjualan</th>
                    <th align="center">Omset Forecast</th>
                    <th>error(omset-forecast)</th>
                    <th>(omset-forecast)2</th>
                  </tr>
                  <?php
                    include "config.php";
                    $dapat = mysqli_query($connect, "SELECT * FROM penjualan WHERE id_barang='$data' ");
                    if (mysqli_num_rows($ambil) > 0) {
                      $x = 0;
                      $jumlah_z = 0;
                      $jumlah_x = 0;
                      $jumlah_y = 0;
                      while ($pecah = mysqli_fetch_array($ambil)) {
                        $jumlah_z += $x;  
                        $jumlah_x = $pecah['jumlah'] - $pecah['average'];
                        $jumlah_y += ($x * $x);
                        ?>

                        <tr>
                          <td><?=$x+1;?>.</td>
                          <td><?=$pecah['bulan'];?></td>
                          <td align="center"><?=$pecah['tahun'];?></td>
                          <td align="center"><?=$pecah['jumlah'];?></td>
                          <td align="center"><?=$pecah['average'];?></td>
                          <td align="center"><?=$pecah['jumlah'] - $pecah['average'];?></td>
                          <td align="center"><?=pow($jumlah_x, 2);?></td>
                        </tr>
                      <?php 
                      $x++; 
                    } 
                    ?>

                    <?php
                    $Bulan = "Januari";
                    $tahun = date('Y');
                    ?>

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
                            $res = $total/count($days);
                            $count++;

                    }
                for ($i=4; $i<count($res); $i++) {
                    echo $res['$i']."<br>";
                }
                                ?>
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
                          <td align="center"><?=$jumlah_y;?></td>
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
                      <?php
                    }
                    ?>

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