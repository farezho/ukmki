<!DOCTYPE html>
<html>
<head>
	<title>UKMKI UNAIR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/cssDaftarAdmin.css ?>">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/w3.css ?>">
</head>

<body>
	<div class="w3-row">
		<div class="wrapper">
			<h1>Halaman Registrasi Admin</h1><br/>

			<form method="post" action="<?php echo base_url('daftarAdmin/aksi_daftar')?>">
				<label>Username</label>
				<input id="iA" type="text" name="username" required><br/><br/>	
				<label>Password</label>
				<input id="iA" type="password" name="password" required><br/><br/>
				<label>Re-type password</label>
				<input id="iA" type="password" name="re-password" required><br/><br/>
				<label>Nama Lengkap</label>
				<input id="iA" type="text" name="nama" required><br/><br/>
				<label>Email</label>
				<input id="iA" type="text" name="email" required><br/><br/>
				<label>No. Hp</label>
				<input id="iA" type="number" name="no_hp" required><br/><br/>
				<label>Alamat</label>
			 	<input id="iA" type="text" name="alamat" required><br/><br/>	
				<input type="submit" name="submit" value="Submit"/>
			</form>
			<span> 
				<p id="backHome">Kembali ke halaman sebelumnya >> <a id="backHome2" href="<?php echo base_url('login')?>">Klik</a> </p> 
			</span>	
		</div>
	</div>
</body>
</html>