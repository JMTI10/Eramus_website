<?php require_once('header.php');?>
<!--
 * File:   index.php
 * Author: Iuri Gonçalves
 * Date:   2018
 -->
<!-- GRAFICOS -->
<script type="text/javascript">
   //temperatura 
   google.load("visualization", "1", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart);
   
   function drawChart() {
       var data = google.visualization.arrayToDataTable([
           ['class Name','olhao'],
           <?php 					
      $query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = 1";							
       $exec = mysqli_query($mysqli,$query);
       while($row = mysqli_fetch_array($exec)){
      echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
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
       var chart = new google.visualization.LineChart(document.getElementById("chart-temp-portugal"));
       chart.draw(data, options);
   }
   //fim temperatura
   
   //humidade				
   google.load("visualization", "2", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart1);
   
   function drawChart1() {
       var data1 = google.visualization.arrayToDataTable([
           ['class Name', 'olhao'],
           <?php 
      $query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = 1";						
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
       var chart1 = new google.visualization.LineChart(document.getElementById("chart-temp-humidade-portugal"));
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
      $query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = 1";							
      $exec = mysqli_query($mysqli,$query);
      while($row = mysqli_fetch_array($exec)){
      	 echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
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
       var chart2 = new google.visualization.LineChart(document.getElementById("chart-temp-pressao-portugal"));
       chart2.draw(data2, options2);
   }
   //fim pressao
   //gas
   google.load("visualization", "4", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart4);
   
   function drawChart4() {
       var data4 = google.visualization.arrayToDataTable([
           ['class Name', 'olhao'],
           <?php 					
      $query = "SELECT * from sensors_readings where id_sensor = 4 and id_location = 1";							
      $exec = mysqli_query($mysqli,$query);
      while($row = mysqli_fetch_array($exec)){
      	 echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
      }
      ?>
       ]);
       var options4 = {
           //title: 'pressure',
           legend: {
               position: 'top',
               textStyle: {
                   color: 'blue',
                   fontSize: 16
               }
           }
       };
       var chart4 = new google.visualization.LineChart(document.getElementById("chart-temp-gas-portugal"));
       chart4.draw(data4, options4);
   }
   //fim gas
</script>
<script type="text/javascript">
   //temperatura 
   google.load("visualization", "1", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart);-
   
   function drawChart() {
       var data = google.visualization.arrayToDataTable([
           ['class Name','Fano'],
           <?php 					
      $query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = 2";							
      //echo $query;
      
       $exec = mysqli_query($mysqli,$query);
       while($row = mysqli_fetch_array($exec)){
      echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
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
       var chart = new google.visualization.LineChart(document.getElementById("chart-temp-italy"));
       chart.draw(data, options);
   }
   //fim temperatura
   
   //humidade				
   google.load("visualization", "2", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart1);
   
   function drawChart1() {
       var data1 = google.visualization.arrayToDataTable([
           ['class Name', 'Fano'],
           <?php 
      $query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = 2";						
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
       var chart1 = new google.visualization.LineChart(document.getElementById("chart-temp-humidade-italy"));
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
           ['class Name', 'Fano'],
           <?php 					
      $query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = 2";							
      $exec = mysqli_query($mysqli,$query);
      while($row = mysqli_fetch_array($exec)){
      	 echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
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
       var chart2 = new google.visualization.LineChart(document.getElementById("chart-temp-pressao-italy"));
       chart2.draw(data2, options2);
   }
   //fim pressao
   
   //Gas
   google.load("visualization", "4", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart3);
   
   function drawChart3() {
       var data3 = google.visualization.arrayToDataTable([
           ['class Name', 'Fano'],
           <?php 					
      $query = "SELECT * from sensors_readings where id_sensor = 4 and id_location = 2";							
      $exec = mysqli_query($mysqli,$query);
      while($row = mysqli_fetch_array($exec)){
      	 echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
      }
      ?>
       ]);
       var options3 = {
           //title: 'pressure',
           legend: {
               position: 'top',
               textStyle: {
                   color: 'blue',
                   fontSize: 16
               }
           }
       };
       var chart3 = new google.visualization.LineChart(document.getElementById("chart-temp-gas-italy"));
       chart3.draw(data3, options3);
   }
   //fim Gas
</script>
<script type="text/javascript">
   //temperatura 
   google.load("visualization", "1", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart);
   
   function drawChart() {
       var data = google.visualization.arrayToDataTable([
           ['class Name','Huittinen'],
           <?php 					
      $query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = 3";							
      //echo $query;
      
       $exec = mysqli_query($mysqli,$query);
       while($row = mysqli_fetch_array($exec)){
      echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
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
       var chart = new google.visualization.LineChart(document.getElementById("chart-temp-finland"));
       chart.draw(data, options);
   }
   //fim temperatura
   
   //humidade				
   google.load("visualization", "2", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart1);
   
   function drawChart1() {
       var data1 = google.visualization.arrayToDataTable([
           ['class Name', 'Huittinen'],
           <?php 
      $query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = 3";						
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
       var chart1 = new google.visualization.LineChart(document.getElementById("chart-temp-humidade-finland"));
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
           ['class Name', 'Huittinen'],
           <?php 					
      $query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = 3";							
      $exec = mysqli_query($mysqli,$query);
      while($row = mysqli_fetch_array($exec)){
      	 echo "['".$row['reading_date'].' '.$row['reading_hour']."',".$row['readings']."],";
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
       var chart2 = new google.visualization.LineChart(document.getElementById("chart-temp-pressao-finland"));
       chart2.draw(data2, options2);
   }
   //fim pressao
</script>
<link rel="stylesheet" type="text/css" href="styles.css">
<body id="page-top">
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
               <!-- Content Row -->
               <div class="row">
                  <div class="col-lg-2 mb-2">
                     <div class="card bg-success text-white shadow">
                        <div class="card-body">
                           Portugal (Olhão)
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Temperature Portugal -->
               <div class="row">
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Temperature</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = 1 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	 echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidity</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = 1 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	 echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pressure</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = 1 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                                 <div class="row no-gutters align-items-center">
                                    <div class="col-auto"></div>
                                    <div class="col"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Pending Requests Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">CO<sup>2</sup></div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 4 and id_location = 1 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Content Row -->	
			   <div class="row">
				   <div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-danger shadow h-100 py-2">
						 <div class="card-body">
							<div class="row no-gutters align-items-center">
							   <div class="col mr-2">
								  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">IAQ</div>
								  <?php
									 $query1 = "SELECT * from sensors_readings where id_sensor = 7 and id_location=1 order by reading_Date DESC, reading_hour DESC LIMIT 1";    
									 $result 			= $mysqli->query($query1);
									 $obj				= $result->fetch_object();
									 $date 			    = $obj->reading_date;
									 $time 			    = $obj->reading_hour;
									 $id_location 		= $obj->id_location;
									 $score              = $obj->readings;					
									 
										if      ($score >= 301){
											$IAQ = "Hazardous";
										}
										else if ($score >= 201 && $score <= 300 ){
											$IAQ = "Very Unhealthy";
											}
										else if ($score >= 176 && $score <= 200 ){ 
											$IAQ = "Unhealthy";
											}
										else if ($score >= 151 && $score <= 175 ){
											$IAQ = "Unhealthy for Sensitive Groups";
											}
										else if ($score >=  51 && $score <= 150 ){
											$IAQ = "Moderate";
											}
										else if ($score >=  00 && $score <=  50 ){
											$IAQ = "Good";
											}
										echo "".$IAQ."";
										$score = (100 - $score) * 5;
									 ?>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
			   </div>
               <!-- Content Row -->
               <div class="row">
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">Temperature in centigrades degrees</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-portugal"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">humidade</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-humidade-portugal"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">pressure</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-pressao-portugal"></div>
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
                              <!--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
                              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                 <div class="dropdown-header">Dropdown Header:</div>
                                 <a class="dropdown-item" href="#">Action</a>
                                 <a class="dropdown-item" href="#">Another action</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="chart-area" id="chart-temp-gas-portugal"></div>
                        </div>
                        <!-- Card Body -->									
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-2 mb-2">
                     <div class="card bg-success text-white shadow">
                        <div class="card-body">
                           Italy (Fano)
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- Earnings (Monthly) Card Example -->            
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Temperature</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = 2 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->            
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidity</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = 2 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->           
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pressure</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = 2 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                                 <div class="row no-gutters align-items-center"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Pending Requests Card Example -->            
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">C0<sup>2</sup></div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 4 and id_location = 2 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Content Row -->
               <!-- Content Row -->
			   <div class="row">
				   <div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-danger shadow h-100 py-2">
						 <div class="card-body">
							<div class="row no-gutters align-items-center">
							   <div class="col mr-2">
								  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">IAQ</div>
								  <?php
									 $query2 = "SELECT * from sensors_readings where id_sensor = 7 and id_location = 2 order by reading_Date DESC, reading_hour DESC LIMIT 1";    
									 $result 			= $mysqli->query($query2);
									 $obj				= $result->fetch_object();
									 $date 			    = $obj->reading_date;
									 $time 			    = $obj->reading_hour;
									 $id_location 		= $obj->id_location;
									 $score2              = $obj->readings;
										if($result->num_rows <= 0){
											$IAQ = " ";
										}
										else if  ($score2 >= 301){
											$IAQ = "Hazardous";
										}
										else if ($score2 >= 201 && $score2 <= 300 ){
											$IAQ = "Very Unhealthy";
											}
										else if ($score2 >= 176 && $score2 <= 200 ){ 
											$IAQ = "Unhealthy";
											}
										else if ($score2 >= 151 && $score2 <= 175 ){
											$IAQ = "Unhealthy for Sensitive Groups";
											}
										else if ($score2 >=  51 && $score2 <= 150 ){
											$IAQ = "Moderate";
											}
										else if ($score2 >=  00 && $score2 <=  50 ){
											$IAQ = "Good";
											}							
										echo "".$IAQ."";
										$score2 = (100 - $score2) * 5;						
										?>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
			   </div>   
               <!-- Content Row -->			
               <div class="row">
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">Temperature in centigrades degrees</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-italy"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">humidade</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-humidade-italy"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->                                
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">pressure</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-pressao-italy"></div>
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
                              <!--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
							<div class="chart-area" id="chart-temp-gas-italy"></div>						
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-2 mb-2">
                     <div class="card bg-success text-white shadow">
                        <div class="card-body">
                           Finland (Huittinen)
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- Earnings (Monthly) Card Example -->			
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Temperature</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = 3 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->			
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidity</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = 3 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->			
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pressure</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = 3 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                                 <div class="row no-gutters align-items-center"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Pending Requests Card Example -->			
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">CO<sup>2</sup></div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 4 and id_location = 3 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Content Row -->
               <!-- Content Row -->		
				<div class="row">

               <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-danger shadow h-100 py-2">
                     <div class="card-body">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">IAQ</div>
                              <?php
                                 $query3 = "SELECT * from sensors_readings where id_sensor = 7 and id_location= 3 order by reading_Date DESC, reading_hour DESC LIMIT 1";    
                                 $result 			= $mysqli->query($query3);
                                 $obj				= $result->fetch_object();
                                 $date 			    = $obj->reading_date;
                                 $time 			    = $obj->reading_hour;
                                 $id_location 		= $obj->id_location;
                                 $score3              = $obj->readings;					
                                 
                                 	if($result->num_rows <= 0){
                                 		$IAQ = " ";
                                 	}
                                 	else if  ($score2 >= 301){
                                 		$IAQ = "Hazardous";
                                 	}
                                 	else if ($score3 >= 201 && $score3 <= 300 ){
                                 		$IAQ = "Very Unhealthy";
                                 		}
                                 	else if ($score3 >= 176 && $score3 <= 200 ){ 
                                 		$IAQ = "Unhealthy";
                                 		}
                                 	else if ($score3 >= 151 && $score3 <= 175 ){
                                 		$IAQ = "Unhealthy for Sensitive Groups";
                                 		}
                                 	else if ($score3 >=  51 && $score3 <= 150 ){
                                 		$IAQ = "Moderate";
                                 		}
                                 	else if ($score3 >=  00 && $score3 <=  50 ){
                                 		$IAQ = "Good";
                                 		}
                                 	echo "".$IAQ."";
                                 	$score3 = (100 - $score3) * 5;						
                                 ?>
                           </div>
                        </div>
                     </div>
                  </div>
				</div>
			   </div>
               <!-- Content Row -->		  
               <div class="row">
                  <!-- Area Chart -->							
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">Temperature in centigrades degrees</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-finland"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->						
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">humidade</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-humidade-finland"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->							
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->								
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">pressure</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-pressao-finland"></div>
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
                              <!--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                              <canvas id="#"></canvas>
                           </div>
                           <div class="mt-4 text-center small">
                              <span class="mr-2">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-2 mb-2">
                     <div class="card bg-success text-white shadow">
                        <div class="card-body">
                           POLAND (Poznan)
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- Earnings (Monthly) Card Example -->			
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Temperature</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = 4 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->			
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidity</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = 4 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->			
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pressure</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = 4 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                                 <div class="row no-gutters align-items-center"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Pending Requests Card Example -->	
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">CO<sup>2</sup></div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 4 and id_location = 4 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Content Row -->
               <!-- Content Row -->		
			   <div class="row">
				   <div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-danger shadow h-100 py-2">
						 <div class="card-body">
							<div class="row no-gutters align-items-center">
							   <div class="col mr-2">
								  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">IAQ</div>
								  <?php
									 $query4 = "SELECT * from sensors_readings where id_sensor = 7 and id_location = 4 order by reading_Date DESC, reading_hour DESC LIMIT 1";    
									 $result 			= $mysqli->query($query4);
									 $obj				= $result->fetch_object();
									 $date 			    = $obj->reading_date;
									 $time 			    = $obj->reading_hour;
									 $id_location 		= $obj->id_location;
									 $score4              = $obj->readings;					
									 
										if($result->num_rows <= 0){
											$IAQ = " ";
										}
										else if  ($score2 >= 301){
											$IAQ = "Hazardous";
										}
										else if ($score4 >= 201 && $score4 <= 300 ){
											$IAQ = "Very Unhealthy";
											}
										else if ($score4 >= 176 && $score4 <= 200 ){ 
											$IAQ = "Unhealthy";
											}
										else if ($score4 >= 151 && $score4 <= 175 ){
											$IAQ = "Unhealthy for Sensitive Groups";
											}
										else if ($score4 >=  51 && $score4 <= 150 ){
											$IAQ = "Moderate";
											}
										else if ($score4 >=  00 && $score4 <=  50 ){
											$IAQ = "Good";
											}
										echo "".$IAQ."";
										$score4 = (100 - $score4) * 5;						
									 ?>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
               <!-- Content Row -->			
               <div class="row">
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->								
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">Temperature in centigrades degrees</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->						
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->									
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">humidade</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-humidade"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->							
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">pressure</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-pressao"></div>
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
                              <!--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                              <canvas id="#"></canvas>
                           </div>
                           <div class="mt-4 text-center small">
                              <span class="mr-2">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-2 mb-2">
                     <div class="card bg-success text-white shadow">
                        <div class="card-body">
                           CZECH REPUBLIC (Liberec)
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Temperature</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 1 and id_location = 5 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidity</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 2 and id_location = 5 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pressure</div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 3 and id_location = 5 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";	
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                                 <div class="row no-gutters align-items-center"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Pending Requests Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">CO<sup>2</sup></div>
                                 <?php
                                    $query = "SELECT * from sensors_readings where id_sensor = 4 and id_location = 5 ORDER BY reading_date DESC, reading_hour DESC LIMIT 1";
                                    $exec = mysqli_query($mysqli,$query);
                                    while($row = mysqli_fetch_array($exec))
                                    {
                                    	echo "".$row['readings']."";
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Content Row -->
               <!-- Content Row -->	
			   <div class="row">
				   <div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-danger shadow h-100 py-2">
						 <div class="card-body">
							<div class="row no-gutters align-items-center">
							   <div class="col mr-2">
								  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">IAQ</div>
								  <?php
									 $query5 = "SELECT * from sensors_readings where id_sensor = 7 and id_location = 5 order by reading_Date DESC, reading_hour DESC LIMIT 1";    
									 $result 			= $mysqli->query($query5);
									 $obj				= $result->fetch_object();
									 $date 			    = $obj->reading_date;
									 $time 			    = $obj->reading_hour;
									 $id_location 		= $obj->id_location;
									 $score5              = $obj->readings;					
									 
										if($result->num_rows <= 0){
											$IAQ = " ";
										}
										else if  ($score2 >= 301){
											$IAQ = "Hazardous";
										}
										else if ($score5 >= 201 && $score5 <= 300 ){
											$IAQ = "Very Unhealthy";
											}
										else if ($score5 >= 176 && $score5 <= 200 ){ 
											$IAQ = "Unhealthy";
											}
										else if ($score5 >= 151 && $score5 <= 175 ){
											$IAQ = "Unhealthy for Sensitive Groups";
											}
										else if ($score5 >=  51 && $score5 <= 150 ){
											$IAQ = "Moderate";
											}
										else if ($score5 >=  00 && $score5 <=  50 ){
											$IAQ = "Good";
											}
										echo "".$IAQ."";
										$score5 = (100 - $score5) * 5;						
									 ?>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
               <!-- Content Row -->			
               <div class="row">
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">Temperature in centigrades degrees</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">humidade</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-humidade"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Pie Chart -->
                  <!-- Area Chart -->
                  <div class="col-xl-6 col-lg-6">
                     <div class="card shadow mb-5">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">pressure</h6>
                           <div class="dropdown no-arrow">
                              <!--<a class="dropdown-toggle" href="graphs.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                           <div class="chart-area" id="chart-temp-pressao"></div>
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
                              <!--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              <!--</a>-->
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
                              <canvas id="#"></canvas>
                           </div>
                           <div class="mt-4 text-center small">
                              <span class="mr-2">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--<div class="row">-->
               <!-- Area Chart -->
               <!--<div class="col-xl-8 col-lg-7">
                  <div class="card shadow mb-4">-->
               <!-- Card Header - Dropdown -->
               <!--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
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
                  </div>-->
               <!-- Card Body -->
               <!--<div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  </div>
                  </div>
                  </div>-->
               <!-- Pie Chart -->
               <!--<div class="col-xl-4 col-lg-5">
                  <div class="card shadow mb-4">-->
               <!-- Card Header - Dropdown -->
               <!--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
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
                  </div>-->
               <!-- Card Body -->
               <!--<div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>-->
               <!-- Content Row -->
               <!--<div class="row">-->
               <!-- Content Column -->
               <!--<div class="col-lg-6 mb-4">-->
               <!-- Project Card Example -->
               <!--<div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                  </div>
                  <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  </div>
                  </div>
                  </div>-->
               <!-- Color System -->
               <!--<div class="row">
                  <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                  <div class="card-body">
                  Primary
                  <div class="text-white-50 small">#4e73df</div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                  >div class="card-body">
                  Success
                  <div class="text-white-50 small">#1cc88a</div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                  <div class="card-body">
                  Info
                  <div class="text-white-50 small">#36b9cc</div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                  <div class="card-body">
                  Warning
                  <div class="text-white-50 small">#f6c23e</div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                  <div class="card-body">
                  Danger
                  <div class="text-white-50 small">#e74a3b</div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                  <div class="card-body">
                  Secondary
                  <div class="text-white-50 small">#858796</div>
                  </div>
                  </div>
                  </div>
                  </div>          
                  <div class="col-lg-6 mb-4">-->
               <!-- Illustrations -->
               <!--<div class="card shadow mb-4">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                  </div>
                  <div class="card-body">
                  <div class="text-center">
                  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                  </div>
                  </div>-->
               <!-- Approach -->
               <!--<div class="card shadow mb-4">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                  </div>
                  <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>-->
               <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.php">Logout</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- Footer -->
   <?php require_once('footer.php');?>
   <!-- End of Footer -->
