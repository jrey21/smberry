<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SMberry Management System</title>
 	
  <?php include('./header.php'); ?>
  <?php include('./db_connect.php'); ?>
  <?php 
  session_start();
  if(isset($_SESSION['login_id']))
  header("location:index.php?page=home");

  $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
  foreach ($query as $key => $value) {
      if(!is_numeric($key))
          $_SESSION['setting_'.$key] = $value;
  }
  ?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    background: white;
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:58%;
		height: calc(100%);
		background:lightgreen;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}
	.logo {
		margin-top:5%;
		margin-left: 44%;
		display: relative;
	}
	.img{
		text-align: center;
	}

	.name{
		margin: auto;
		align-items: center;
		display: absolute;
		justify-content: center;
		padding-top:25%;
		margin-right: 2%;
		text-shadow: 2px 2px 8px white;
	}
	.text{
		color: green;
		font-size: 38px;
		font-weight: bold;
		margin-left: 15%;
		margin-right: 10%;
		text-align: center;
}
</style>

<body>

<main id="main" class=" bg-dark">	
	<div id="login-left">	
		<div class="name">
			<h1 class="text"> SMberry Management System</h1>
		</div>
		<div class="logo">
			<img src="assets/img/mmh_logo.png" width="30%" height="30%" class="img">
		</div>
	</div>
	<div id="login-right">
		<div class="card col-md-8">
			<div class="card-body">
				<form id="login-form">
					<div class="form-group">
						<label for="username" class="control-label">Username</label>
						<input type="text" id="username" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input type="password" id="password" name="password" class="form-control">
					</div>
					<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary" type="submit">Login</button></center>
				</form>
			</div>
		</div>
	</div>
</main>

</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault();
		$('#login-form button[type="submit"]').attr('disabled', true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		
			$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err);
				$('#login-form button[type="submit"]').removeAttr('disabled').html('Login');
			},
			success: function(resp) {
				if (resp == 1) {
					location.href = 'index.php?page=home';
				} else if (resp == 2) {
					location.href = 'voting.php';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
					$('#login-form button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		});
	});
</script>
</html>
