<?php
				$servername = "localhost";
				$username = "paeffl_meteo";
				$password = "mete0209Aqw2";
				$dbname = "paeffl_meteo";

				// Create connection
				$mysqli = new mysqli($servername, $username, $password, $dbname);
				if (isset($_GET["country"]) && !empty($_GET["country"])){
								$country = $_GET["country"];
							}				
							else{
								$country = 1;
							}
				$resultset = mysqli_query($mysqli,"select *  from sensors_readings WHERE ID_sensor=2 and id_location=$country");
				$json_array = array();
				while($row = mysqli_fetch_assoc($resultset))
				{
					$json_array[] = $row;
				}
				print(json_encode($json_array));
				// Check connection
				/*if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}*/
?>				