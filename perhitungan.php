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
                  <?php
                    
                    include 'config.php';

                    $data = $_GET['obat'];
                    $ambil = mysqli_query($connect, "SELECT * FROM penjualan WHERE id_obat='$data' ");
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
                
                        ?>
        <center><h1>Hasil Prediksi</h1>
        <h1 class="judul">Single Moving Average</h1></center>
          <br>
            <center>
              <table class="table table-bordered">
             <thead bgcolor="grey">
                <tr>
                    <th>Nomor</th>
                    <th>Bulan </th>
                    <th>Tahun </th>
                    <th>Jumlah </th>
                    <th>Average</th>
                    <th>Error(Omset-Forecast)</th>
                    <th>(Omset-Forecast)2</th>
                </tr>
             </thead>
                <?php
                include 'config.php';
                $ambil = mysqli_query($connect, "SELECT * FROM penjualan WHERE id_obat='$data' ") or die (mysqli_error($connect));
                if (mysqli_num_rows($ambil) > 0) {
                        $x = 0;
                        $jumlah_z = 0;
                        $jumlah_x = 0;
                        $jumlah_y = 0;
                        while ($pecah = mysqli_fetch_array($ambil)) {
                            $jumlah_z += $x;  
                            $jumlah_x = $pecah['jumlah'] - $pecah['average'];
                            $jumlah_y += ($jumlah_x * $jumlah_x);
                            ?>
                <tr>
                    <td><?=$x+1; ?></td>
                    <td><?=$pecah['bulan']; ?></td>
                    <td align="center"><?=$pecah['tahun']; ?></td>
                    <td align="center"><?=$pecah['jumlah']; ?></td>
                    <td align="center"><?=$pecah['average']; ?></td>
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
                  <td align="center"><?php echo ($jumlah_y); ?></td>
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

              </table>
            </center>
            <table border="1" width="450">
            Hasil Peramalan :
            <thead>
              <tr>
                <td align="center">Peramalan untuk Bulan <?=$Bulan?> <?=$tahun?> adalah</td><td align="center"><?=$res?></td>
              </tr>
               <tr>
                <td align="center">Nilai kesalahan perhitungan (RMSE) adalah</td><td align="center"><?=$RMSE?></td>
              </tr>
            </thead>
           </table>
           <br>
           <center>
           <a href="cetak.php" target="_blank" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-print"></span> CETAK</a>
           </center>
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