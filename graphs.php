<?php require_once('header.php');?>

    <!-- GRAFICOS -->
    <script type="text/javascript">
        //temperatura 
        google.load("visualization", "1", {
            packages: ["corechart"]
        });
        google.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['class Name','Olhao'],
                <?php 					
							//id_location = $_GET['country'] and
							if (isset($_GET["country"]) && !empty($_GET["country"])){
								$country = $_GET["country"];
							}				
							else{
								$country = 1;
							}

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
							 }
						?>
            ]);
            //LineChart
            //PieChart
            var options = {
                //title: 'Temperature in centigrades degrees',
                legend: {
                    position: 'top',
                    textStyle: {
                        color: 'blue',
                        fontSize: 16
                    }
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById("chart-temp"));
            chart.draw(data, options);
            var x = document.getElementById("date");
			var x = document.getElementById("date2");
            //x.setDate($_GET["day"]);
			//x.setDate2($_GET["day2"]);
        }
        //fim temperatura

        //humidade				
        google.load("visualization", "2", {
            packages: ["corechart"]
        });
        google.setOnLoadCallback(drawChart1);

        function drawChart1() {
            var data1 = google.visualization.arrayToDataTable([
                ['class Name', 'Olhao'],
                <?php 
							if (isset($_GET["country"]) && !empty($_GET["country"])){
								$country = $_GET["country"];
							}				
							else{
								$country = 1;
							}		
						$query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = $country";
							if(isset($_GET["day"]) && !empty($_GET["day"])){
								$query = $query . " and reading_date between '$_GET[day]' and '$_GET[day2] order by reading_date, reading_hour'";
								$_GET[day] = $_SET[day];
								$_GET[day2] = $_SET[day2];
							}else{
								$query = $query;
							}
							$exec = mysqli_query($mysqli,$query);
							while($row = mysqli_fetch_array($exec)){
								echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
							}
					?>
            ]);
            var options1 = {
                //title: 'humidade',
				slantedText: true,
				slantedTextAngle: 90,
                legend: {
                    position: 'top',
                    textStyle: {
                        color: 'blue',
                        fontSize: 16
                    }
					
                },
				hAxis: { 
					textStyle : {
						fontSize: 9 // or the number you want
					}
				}
            };
            var chart1 = new google.visualization.LineChart(document.getElementById("chart-temp-humidade"));
            chart1.draw(data1, options1);
        }
        //fim humidade

        //pressao
        google.load("visualization", "3", {
            packages: ["corechart"]
        });
        google.setOnLoadCallback(drawChart2);

        function drawChart2() {
            var data2 = google.visualization.arrayToDataTable([
                ['class Name', 'olhao'],
                <?php 
							if (isset($_GET["country"]) && !empty($_GET["country"])){
								$country = $_GET["country"];
							}				
							else{
								$country = 1;
							}

						$query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = $country";
							if(isset($_GET["day"]) && !empty($_GET["day"])){
								$query = $query . " and between reading_date='$_GET[day] and reading_date='$_GET[day2] order by reading_date, reading_hour'";
								$_GET[day] = $_SET[day];
							}else{
								$query = $query;
							}

						$exec = mysqli_query($mysqli,$query);
						while($row = mysqli_fetch_array($exec)){
							 echo "['".$row['reading_hour']."',".$row['value']."],";
						}
					?>
            ]);
            var options2 = {
                //title: 'pressure',
                legend: {
                    position: 'top',
                    textStyle: {
                        color: 'blue',
                        fontSize: 16
                    }
                }
            };
            var chart2 = new google.visualization.LineChart(document.getElementById("chart-temp-pressao"));
            chart2.draw(data2, options2);
        }
        //fim pressao
    </script>
	<link rel="stylesheet" type="text/css" href="styles.css">

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

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>                                
                            </div>
                            <div class="col-md-6"">
							   <div class="mb-3">

                                <form action="graphs.php" class="form-inline">
                                    <select name="country" class="form-control" value="<?php echo $_GET[country]; ?>">

                                        <div class="label">Select Name:</div>
                                        <?php	
					$queryusers = "SELECT id_location,name_country FROM locations";  
					$result = mysqli_query($mysqli,$queryusers);
					while ( $d=mysqli_fetch_assoc($result)){
						  echo "<option value=".$d['id_location'].">".$d['name_country']."</option>";
					}
				?>				
                                            <input id="date" type="date" name="day" class="form-control" value="<?php echo ($_GET[day] != null) ? $_GET[day] : "2019-09-01"; ?>">
											<input id="date2" type="date" name="day2" class="form-control" value="<?php echo ($_GET[day2] != null) ? $_GET[day2] : date("Y-m-d"); ?>">
                                            <input type="submit" value="Send" class="btn btn-primary">

                                    </select>
                                </form>
							   </div>
							</div>
                        

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-5">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Temperature in centigrades degrees
</h6>
                                        <div class="dropdown no-arrow">
                                            <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area" id="chart-temp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pie Chart -->
                            <!-- Area Chart -->
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-5">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Humidity</h6>
                                        <div class="dropdown no-arrow">
                                            <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area" id="chart-temp-humidade">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pie Chart -->
                            <!-- Area Chart -->
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-5">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Pressure</h6>
                                        <div class="dropdown no-arrow">
                                            <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area" id="chart-temp-pressao">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pie Chart -->
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-5">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">CO<sup>2</sup></h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">                               
                            </div>
                        </div>
                </div>
	<script type="text/javascript">
	window.onresize = function(){ location.reload(); }
	
	</script>
                <!-- Footer -->
                <?php require_once('footer.php');?>
                    <!-- End of Footer -->