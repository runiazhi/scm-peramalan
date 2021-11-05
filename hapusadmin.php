<?php
    include 'config.php';
    $id=$_GET['id'];
    $ambil=mysqli_query($connect,"DELETE FROM admin WHERE id_admin='$id' ");
    if ($ambil) {
        echo "
        <script>
        alert('Data Berhasil Dihapus')
        document.location.href='admin.php'
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