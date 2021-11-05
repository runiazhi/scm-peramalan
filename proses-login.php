<?php
	include 'config.php';
	$username	= $_POST['username'];
	$password	= $_POST['password'];

		$sql = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
		$result = mysqli_num_rows($sql);
		if ($result) {
			echo "<script>alert('Login Berhasil');</script>";
			echo "<script>location='dasboard.php';</script>";
		}else {
			echo "
			<script type='text/javascript'>
			alert('Username dan Password Salah');
			history.back(self);
			</script>";
		}
?>