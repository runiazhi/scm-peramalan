<?php
    include 'config.php';
    $ambil=$connect->query("SELECT * FROM penjualan join obat on penjualan.id_obat=obat.id_obat");
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
               <h3><span class="glyphicon glyphicon-briefcase"></span>  Data Penjualan</h3>
                <a href="tambahpenjualan.php" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span> Tambah Penjualan</a>
            <br/>
            <br/>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Penjualan</th>
                    <th>Jenis Penjualan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php while($pecah = mysqli_fetch_array($ambil)) :?>
                  <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $pecah['id_penjualan']; ?></td>
                    <td><?php echo $pecah['nama_obat']; ?></td>
                    <td><?php echo $pecah['bulan']; ?></td>
                    <td><?php echo $pecah['tahun']; ?></td>
                    <td><?php echo $pecah['jumlah']; ?></td>
                    <td>
                        <a href="ubahpenjualan.php?id=<?php echo $pecah['id_penjualan']; ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapuspenjualan.php?id=<?php echo $pecah['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endwhile ?>
                </tbody>
            </table>
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
