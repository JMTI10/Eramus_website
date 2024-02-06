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
				$resultset = mysqli_query($mysqli,"select *  from sensors_readings WHERE ID_sensor=4 and id_location=$country");	
					$queryusers = "SELECT id_location,name_country FROM locations";  					
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
				/*$resultset = mysqli_query($mysqli,$queryusers);
					while ( $d=mysqli_fetch_assoc($resultset)){
						  echo "<option value=".$d['id_location'].">".$d['name_country']."</option>";
					}*/
?>				