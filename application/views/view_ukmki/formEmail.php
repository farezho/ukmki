<!DOCTYPE html>
<html>
<head>
	<title>Report Bug</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/clearfix.css">
	<link rel="stylesheet" type="text/css" href="assets/css/images-slider.css">

	<script src="assets/js/validateForm.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form name="contactMe" onsubmit=" return validateForm();" method="post">
		  			<div class="row">
		  				<div class="col-25">
		  					<label>Email</label>
		  				</div>
		  				<div class="col-75">
		  					<input type="text" id="email" name="email" placeholder="Your email ...">
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-25">
		  					<label>Messages</label>
		  				</div>
		  				<div class="col-75">
		  					<textarea id="email" name="messages" placeholder="Write something here ..."></textarea>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-25">
		  					<input type="submit" name="submit" value="Submit">
		  				</div>
		  				<div class="col-75">
		  					
		  				</div>
		  			</div>
	  			</form>
			</div>
		</div>
	</div>

</body>

</html>