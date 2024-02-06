<?php
				$servername = "localhost";
				$username = "paeffl_meteo";
				$password = "mete0209Aqw2";
				$dbname = "paeffl_meteo";
				
				$mysqli = new mysqli($servername, $username, $password, $dbname);  
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}	
	echo"ola";				
    $email = $_POST['email'];
    $user_password = $_POST['user_password'];
    if(isset($_POST['register']))
    {   
        $register = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `users` WHERE `email`='$email'"));
        if($register == 0)
        {
            $insert = mysqli_query($mysqli,"INSERT INTO `users` (`email`,`user_password`) VALUES ('$email','$user_password')");
            if($insert)
                echo "success";
            else
                echo "error";
        }
        else if($register != 0)
            echo "exist";
    }			
    else if(isset($_POST['login']))
    {
        $login = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `users` WHERE `email`='$email' AND `user_password`='$user_password'"));
        if($login != 0)
            echo "success";
        else
            echo "error";
    }
    mysqli_close($mysqli);
?>