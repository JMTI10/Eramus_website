<?php require_once ('header.php');?>
<?php 		
	echo "start";
	//id_location = $_GET['country'] and
	if (isset($_POST["country"]) && !empty($_POST["country"])){
		$country = $_POST["country"];
		echo "got : " .$country;
	}				
	else{
		$country = 1;
		echo "NO country : " .$country;
	}
	echo "start";
	$csv = array();

	// check there are no errors
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	echo "start FILE \n";
	
	// code to upload file START
	// ------------------------
	
	$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "txt" && $imageFileType != "csv" ) {
  echo "Sorry, only TXT & CSV files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.\n";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.\n";
  }
}

// code to upload file END

// open uploadaded file
$myfile = fopen($target_file, "r") or die("Unable to open file!");
$row = 1;
if ($myfile) {
    while (($data = fgetcsv($myfile, 1000, ";")) !== FALSE) {
       $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }

    fclose($myfile);
} else {
    // error opening the file.
} 


	
	
	if(isset($_POST["file"])){
		echo "submit";
        $name       = $_FILES['file']['name'];  
        $temp_name  = $_FILES['file']['tmp_name'];
		echo $name;
		
		
        if(isset($name) and !empty($name)){
            $location = './uploads/';      
            if(move_uploaded_file($temp_name, $location.$name)){
                echo 'File uploaded successfully';
            }
        } else {
            echo 'You should select a file to upload !!';
        }
    }							/*

							$query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = $country";
							 if(isset($_GET["day"]) && !empty($_GET["day"])){
								$query = $query . " and reading_date between '$_GET[day]' and '$_GET[day2]' order by reading_date, reading_hour";
							$_GET[day] = $_SET[day];
							$_GET[day2] = $_SET[day2];
							}else{
								$query = $query;
							}
							//echo $query;

							 $exec = mysqli_query($mysqli,$query);
							 while($row = mysqli_fetch_array($exec)){
									echo "['".$row['reading_date'].' @ '.$row['reading_hour']."',".$row['readings']."],";
							 }*/
?>

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
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Upload File</h6>
                <!--<a style="float:left;" href="create.php" class="btn btn-info btn-circle btn-lg">
     <i class="fas fa-plus-square"></i>
 </a>-->
            </div>
            <div class="card-body">
             <div class="col-md-6"">
							   <div class="mb-3">

      					   </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

				</div>
			</div>
	  </div>
	  
      <!-- End of Main Content -->

      <!-- Footer -->
	  <?php require_once('footer.php');?>