<?php
/*
 * File:   add_data.php
 * Author: Iuri Gonçalves
 * Date:   2018
 */

// Include config file
require_once "db_conn.php";

 
// Define variables and initialize with empty values
$location = $country = "";
$latitude = $longitude = 0;
$location_err = $country_err = "";
$latitude_err = $longitude_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate location
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter an location.";     
    } else{
        $location = $input_location;
    }
	
	$input_country = trim($_POST["country"]);
    if(empty($input_country)){
        $country_err = "Please enter the country name";     
    }else{
        $country = $input_country;
    }
    
    // Validate country
    $input_latitude = trim($_POST["latitude"]);
    if(empty($input_latitude)){
        $latitude_err = "Please enter the latitude name";     
    }else{
        $latitude = $input_latitude;
    }
	  
	  $input_longitude = trim($_POST["longitude"]);
    if(empty($input_longitude)){
        $longitude_err = "Please enter the longitude name";     
    }else{
        $longitude = $input_longitude;
    }
		
		var_dump($id);
		var_dump($location);
		var_dump($country);
		var_dump($latitude);
		var_dump($longitude);
    
    // Check input errors before inserting in database
    if(empty($location_err) && empty($country_err)){
        // Prepare an update statement
	
		
		
        $sql = "UPDATE locations SET location=?, name_country=?,latitude=?,longitude=? WHERE id_location=?";
		var_dump($sql);
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
			echo "1";
            $stmt->bind_param("ssddi", $param_location, $param_country, $param_latitude, $param_longitude, $param_id);
            
			echo "2";
            // Set parameters
            $param_location = $location;
            $param_country = $country;            
			$param_latitude = $latitude;
			$param_longitude = $longitude;
			$param_id = $id;
            			echo "3";
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: listar.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
						echo "4";
        }
		else{
			echo "SHITTTTT";
			
		}
		
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);	
        
        // Prepare a select statement
        $sql = "SELECT * FROM locations WHERE id_location = ?";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $location = $row["location"];
                    $country = $row["name_country"];
					$latitude = $row["latitude"];
					$longitude = $row["longitude"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("locations: error .php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
        
        // Close connection
        $mysqli->close();
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<?php require_once ('header.php');?>
<meta charset="UTF-8">
  <!-- Page Wrapper -->
  <div id="wrapper">
      <!-- Sidebar -->
	<?php require_once('sidebar.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
		<?php require_once('head.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                            <label>location</label>
                            <textarea name="location" class="form-control"><?php echo $location; ?></textarea>
                            <span class="help-block"><?php echo $location_err;?></span>
                        </div>
						
                        <div class="form-group <?php echo (!empty($country_err)) ? 'has-error' : ''; ?>">
                            <label>country</label>
                            <input type="text" name="country" class="form-control" value="<?php echo $country; ?>">
                            <span class="help-block"><?php echo $country_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($latitude_err)) ? 'has-error' : ''; ?>">
                            <label>latitude</label>
                            <input type="text" name="latitude" class="form-control" value="<?php echo $latitude; ?>">
                            <span class="help-block"><?php echo $latitude_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($longitude_err)) ? 'has-error' : ''; ?>">
                            <label>longitude</label>
                            <input type="text" name="longitude" class="form-control" value="<?php echo $longitude; ?>">
                            <span class="help-block"><?php echo $longitude_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="listar.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
	  <?php require_once('footer.php');?>
