<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
     <form action="../db/verification/verification.php" method="POST">
     	<h2>User Login</h2>
		<?php
			if(isset($_GET['Error'])){
		?>
				<div class="alert alert-danger">
					<?php echo $_GET['Error']; ?>
				</div>
		<?php
			}
		?>

     	<label>Username</label>
     	<input type="text" name="username" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="user" class="btn btn-outline-primary">Login</button>
          <a href="signup.php" class="ca">Create an account?</a>
     </form>
</body>
</html>