<?php
				$servername = "localhost";
				$username = "paeffl_meteo";
				$password = "mete0209Aqw2";
				$dbname = "paeffl_meteo";

				// Create connection
				$mysqli = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}
?>				