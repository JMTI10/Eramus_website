<?php require_once ('header.php');?>
<!--
 * File:   list.php
 * Author: Iuri Gonçalves
 * Date:   2018
 -->

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
              <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Country Infomation</h6>
                <!--<a style="float:left;" href="create.php" class="btn btn-info btn-circle btn-lg">
     <i class="fas fa-plus-square"></i>
 </a>-->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<meta charset="UTF-8">
                  <thead>
                    <tr>
					   <th>Location</th>
					   <th>Country</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      
					  <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					   <th>Location</th>
					   <th>Country</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      
					  <th>actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
             <?php
			 
				include_once('db_conn.php');
				$sql = "SELECT * from locations";
				$result = $mysqli->query($sql);
				//echo "<table>";
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "</td><td>". $row["location"]. "</td><td>" . $row["name_country"]. "</td><td>" . $row["latitude"]."</td><td>".$row["longitude"]."</td>";
						echo "<td><a href='index.php?country=$row[id_location]'>see graphs</a>";
						/*echo "<td><a href='delete.php?del=$row[id_location]'>delete</a> ";
						echo "<a href='edit.php?id=$row[id_location]'>edit</a></td>";*/
						echo "</tr>";
					}
					//echo "</table>";
				} else {
					echo "0 results";
				}
				$mysqli->close();
				?>
                  </tbody>
                </table>
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
