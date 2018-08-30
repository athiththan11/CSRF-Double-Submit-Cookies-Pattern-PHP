<?php

    session_start();

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(($username == "csrf") && ($password == "token")){

			$_SESSION['csrf_session'] = "csrfdscpsamplephp";

			session_regenerate_id();
			setcookie("csrf_session_cookie", session_id(), (time() + (56400)), "/");
			
			include(realpath(__DIR__)."/../src/service.php");
			$csrf_token = generateCSRFToken(session_id());
			setcookie("csrf_token_cookie", $csrf_token, (time() + 300), '/');

            header("location: ./../../index.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login - CSRF DSCP</title>

	<?php include (realpath(__DIR__)."/addons/header.php") ?>

</head>

<body>

	<div class="container">
		<div class="row">

			<!-- Sign in block -->
			<div class="col-md-4 mx-auto order-12">
				<div class="card my-5 p-3 shadow">
					<div class="card-body">
						<h5 class="card-title text-center">Sign In</h5>

						<!-- Sign in Form -->
						<form class="mt-5 mb-3" action="login.php" method="POST">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" value="csrf" required autofocus/>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" value="token" required/>
							</div>
							<button type="submit" class="btn btn-primary btn-block mt-5" name="login">Login</button>
						</form>
						<!-- End Sign in Form -->

					</div>
				</div>
			</div>
			<!-- End Sign in block -->

			<!-- Description block -->
			<div class="col-md-6 mx-auto my-5 order-1">
				<h4>CSRF Double Submit Cookies Pattern</h4>
				<hr class="my-4">
				<p>
					This is a sample PHP application implemented to explain the <b>Cross Site Request Forgery (CSRF) - <i>Double Submit
							Cookies Pattern
						</i></b>.<br/><br/>You can use the following credentials to login to the system.
				</p>
				<ul>
					<li><span>Username: csrf</span></li>
					<li><span>Password: token</span></li>
				</ul>
				<br/>
				<a class="disabled" href="https://github.com/athiththan11/csrf-double-submit-cookies-pattern-php"><i data-feather="github"></i>
					Github Repo</a>
				<br/><br/>
				<small>Check out CSRF Synchronizer Token Pattern implementation on PHP in
					<ul class="list-inline">
						<li class="list-inline-item">
							<a class="disabled" href="https://github.com/athiththan11/csrf-double-submit-cookies-pattern-php">Github</a>
						</li>
						<li class="list-inline-item">
							<a class="disabled" href="https://github.com/athiththan11/csrf-double-submit-cookies-pattern-php">Heroku</a>
						</li>
					</ul>
				</small>
			</div>
			<!-- End Description block -->

		</div>
	</div>

	<script>
		feather.replace()
	</script>

</body>

</html>