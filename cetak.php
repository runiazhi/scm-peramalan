<!DOCTYPE html>
<html>
<head>
	<title>CETAK</title>
</head>
<body>
 
	<center>
 
		<center><h1>Hasil Prediksi Persediaan</h1>
        <h1 class="judul">Single Moving Average</h1></center>
 
	</center>

 	<?php
                    include 'config.php';
                    $ambil = mysqli_query($connect, "SELECT * FROM penjualan WHERE id_obat='200'");
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
	<table border="1" style="width: 100%">
		<tr>
                    <th>Nomor</th>
                    <th>Bulan </th>
                    <th>Tahun </th>
                    <th>Jumlah </th>
                    <th>Average</th>
                    <th>Error(Omset-Forecast)</th>
                    <th>(Omset-Forecast)2</th>
                </tr>
		<?php 
		$no = 1;
		
		$ambil = mysqli_query($connect, "SELECT * FROM penjualan WHERE id_obat='200'") or die (mysqli_error($connect));
		while($pecah = mysqli_fetch_array($ambil)){ 
                            $jumlah_x = $pecah['jumlah'] - $pecah['average'];
                            $jumlah_y += ($jumlah_x * $jumlah_x);
                            ?>
		<tr>
                    <td><?=$no++; ?></td>
                    <td><?=$pecah['bulan']; ?></td>
                    <td align="center"><?=$pecah['tahun']; ?></td>
                    <td align="center"><?=$pecah['jumlah']; ?></td>
                    <td align="center"><?=$pecah['average']; ?></td>
                    <td align="center"><?=$pecah['jumlah'] - $pecah['average'];?></td>
                    <td align="center"><?=pow($jumlah_x, 2);?></td>
                </tr>
		<?php 
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
                  $RMSE = sqrt($jumlah_y) / 12;
                  echo $RMSE;
                  ?>
                </td>
              </tr>
	</table>
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
	<script>
		window.print();
	</script>
 
</body>
</html>