<!DOCTYPE html>
<html>
<head>
	<title>Sistem Prediksi Penjualan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login">
		<center><img src="assets/img/sarjana.png" height="200px" width="250px;" class="gambar"></center>	
		<form action="proses-login.php" method="post" onSubmit="return validasi()">
			<div>
				<center><label>Username</label></center>
				<input type="text" name="username" id="username" placeholder="Masukkan Username" />
			</div>
			<div>
				<center><label>Password</label></center>
				<input type="password" name="password" id="password" placeholder="Masukkan Password" />
			</div>			
			<div>
				<input type="submit" value="Login" class="tombol">
			</div>
		</form>
	</div>
</body>
 
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}
</script>
</html>