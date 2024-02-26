<?php
/*
 * File:   db_conn.php
 * Author: Iuri Gonçalves
 * Date:   2018
 */
				$servername = "localhost";
				$username = "****";
				$password = "****";
				$dbname = "****";

				// Create connection
				$mysqli = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}
?>				
