<?php
/*
 * File:   login.php
 * Author: Iuri Gonçalves
 * Date:   2018
 */
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: list.php");
    exit;
}
 
// Include config file
require_once "db_conn.php";
 
// Define variables and initialize with empty values
$email = $user_password = "";
$email_err = $user_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
		$email = trim($_POST["email"]);
	}
    
    // Check if password is empty
    if(empty(trim($_POST["user_password"]))){
        $user_password_err = "Please enter your password.";
    } else{
        $user_password = trim($_POST["user_password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($user_password_err)){
        // Prepare a select statement
        $sql = "SELECT id_user, email, user_password FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables				
                    $stmt->bind_result($id_user, $email, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($user_password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id_user"] = $id_user;
                            $_SESSION["email"] = $email;
                            
                            // Redirect user to welcome page
                            header("location: list.php");
                        } else{
                            // Display an error message if password is not valid
                            $user_password_err = "The password you entered was not valid.";
                        }
                    }
                }	else{
						// Display an error message if username doesn't exist
						$email_err = "No account found with that email.";
						}
            } 	else{
					echo "Oops! Something went wrong. Please try again later.";
					}
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="manifest" href="img/site.webmanifest">
  <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <title>WeatherStation - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<script>
		function statusChangeCallback(response) {
		console.log('statusChangeCallback');
		console.log(response);
		if (response.status === 'connected') {
		testAPI();
		} else if (response.status === 'not_authorized') {
		document.getElementById('status').innerHTML = 'Login with Facebook ';
		} else {
		document.getElementById('status').innerHTML = 'Login with Facebook ';
		}
		}
		function checkLoginState() {
		FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
		});
		}
		window.fbAsyncInit = function() {
		FB.init({
		appId : '277455199897815',
		cookie : true,
		xfbml : true,
		version : 'v2.2'
		});

		FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
		});
		};
		(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		function testAPI() {
		console.log('Welcome! Fetching your information.... ');
		FB.api('/me?fields=name,email', function(response) {
		console.log('Successful login for: ' + response.name);

		document.getElementById("status").innerHTML = '<p>Welcome '+response.name+'! <a href=https://meteo.p.aeffl.pt/login.php?name='+ response.name.replace(" ", "_") +'&email='+ response.email +'>Continue with facebook login</a></p>'
		});
		}
		// This is called with the results from from FB.getLoginStatus().		
	</script>
	<br><br>
	<script type="text/javascript"></script>

	<div class="container">

    <!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-6 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">              
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
									</div>
									<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
										<div class="form-group">
											<div style="text-align: center;margin-bottom:20px;">
												<img src="img\erasmus-logo.png" >
											</div>
											<input type="email" name="email" placeholder="e-mail here" class="form-control"value="<?php echo $email; ?>">
											<span class="help-block"><?php echo $email_err; ?></span>
										</div>
										<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
											<input type="password" name="user_password" placeholder="password here" class="form-control">					 
											<span class="help-block"><?php echo $user_password_err; ?></span>
										</div>
										</p>
										<p><!--<input type="checkbox" name="remember" /> Remember me-->
										</p>
										<!--<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember Me</label>
											</div>
										</div>-->
										<input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
										<hr>
										<a href="#" class="btn btn-google btn-user btn-block">
											<i class="fab fa-google fa-fw"></i> Login with Google
										</a>
										<center>
											<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
											</fb:login-button>
										</center>
									</form>
										</hr>
									<!--<div class="text-center">
										<a class="small" href="forgot-password.php">Forgot Password?</a>
									</div>-->
									<div class="text-center">
										<a href="register.php">Create an Account!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
