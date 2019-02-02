<!DOCTYPE html>
<html>
	<head>
		<title>UKMKI UNAIR</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/cssLogin.css ?>">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/w3.css ?>">
	</head>

	<body>
		<div class="w3-row">
			<div class="wrapper">
				<h1>Login</h1><br/>

				<form method="post" action="<?php echo base_url('login/aksi_login')?>">
						<input type="text" name="username" required placeholder="Username"><br/><br/>	
						<input type="password" name="password" required placeholder="Password"><br/><br/>
						<input id="tombolSubmit" type="submit" name="submit" value="Submit"/>
				</form>
				
				<div class="footer">
				</div>

			</div>
		</div>
	</body>
</html>       
