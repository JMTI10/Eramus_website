<?php
/*
 * File:   register.php
 * Author: Iuri Gonçalves
 * Date:   2018
 */
// Include config file
require_once "db_conn.php";
 
// Define variables and initialize with empty values
$user_name = $user_password = $email =$confirm_password = "";
$user_name_err = $user_password_err = $email_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["user_name"]))){
        $user_name_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_user FROM users WHERE user_name = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_user_name);
	
            // Set parameters
            $param_user_name = trim($_POST["user_name"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $user_name_err = "This username is already taken.";
                } else{
                    $user_name = trim($_POST["user_name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
		
		//ERRO AQUI!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		/*if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
		} else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";*/
		if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
	
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $user_email = "This email is already being used.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Validate password
    if(empty(trim($_POST["user_password"]))){
        $user_password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["user_password"])) < 6){
        $user_password_err = "Password must have atleast 6 characters.";
    } else{
        $user_password = trim($_POST["user_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($user_password_err) && ($user_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($user_name_err) && empty($user_password_err) && empty($email_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (user_name, user_password, email) VALUES (?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_user_name, $param_user_password, $param_email);
            
            // Set parameters
            $param_user_name = $user_name;
            $param_user_password = password_hash($user_password, PASSWORD_DEFAULT); // Creates a password hash
			$param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: listar.php");
            } else{
                echo "Something went wrong. Please try again later.";
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

  <title>WeatherStation - Register</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group row <?php echo (!empty($user_name_err)) ? 'has-error' : ''; ?>">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="user_name"  placeholder="User Name" class="form-control" value="<?php echo $user_name; ?>">
					<span class="help-block"><?php echo $user_name_err; ?></span>
                </div>
			</div>
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                  <input type="email" name="email" class="form-control form-control-user" placeholder="Email Address" value="<?php echo $email; ?>">
				  <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group row <?php echo (!empty($user_password_err)) ? 'has-error' : ''; ?>">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password"  name="user_password" class="form-control form-control-user" placeholder="Password" value="<?php echo $user_password; ?>">
                  </div>
                  <div class="col-sm-6 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="confirm_password" class="form-control form-control-user" placeholder="Repeat Password" value="<?php echo $confirm_password; ?>">
                  </div>
                </div>				
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">					
					 <div class="mb-3">
							<!--<select name="country" class="form-control">

								<div class="label">Select Name:</div>
								<?php	
									$queryusers = "SELECT id_location,name_country FROM locations";  
									$result = mysqli_query($mysqli,$queryusers);
									while ( $d=mysqli_fetch_assoc($result)){										 
										  echo "<option value='". $d['id_location']."'>".$d['name_country']."</option>";
									}
								?>                                            
							</select>-->
					</div>
				</div>					
			</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
									<a href="index.php"><input type="submit" class="btn btn-primary" value="Register"></a>
					</div>
				</div>
              </form>
              <!--<div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>-->
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
		</div>
	   </div>
	  </div>
	 </div>
    </div>
   </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
