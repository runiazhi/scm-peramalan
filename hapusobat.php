<?php
    
include 'config.php';
$id=$_GET['id'];
$ambil=mysqli_query($connect,"DELETE FROM obat WHERE id_obat='$id' ");
if ($ambil) {
	echo "
	<script>
    alert('Data Berhasil Dihapus')
    document.location.href='obat.php'
    </script>
	";
 //redirect('master/sd.php');
} else {
   echo "
    <script>
    alert('Data Gagal Dihapus')
    </script>
    ";

}
?>