<?php require_once ('header.php');?>
<!--
 * File:   upload.php
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
              <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Upload File</h6>
                <!--<a style="float:left;" href="create.php" class="btn btn-info btn-circle btn-lg">
     <i class="fas fa-plus-square"></i>
 </a>-->
            </div>
            <div class="card-body">
             <div class="col-md-6"">
							   <div class="mb-3">

                                <form action="upload_result.php" method="post" class="form-inline" enctype="multipart/form-data" >
                                    <select name="country" class="form-control" value="<?php echo $_GET['country']; ?>">
										<p>Select Country:</p>
                                        <div class="label"></div>
                                        <?php	
											$queryusers = "SELECT id_location,name_country FROM locations";  
											$result = mysqli_query($mysqli,$queryusers);
											while ( $d=mysqli_fetch_assoc($result)){
												  echo "<option value=".$d['id_location'].">".$d['name_country']."</option>";
											}
										?>				
                                    </select>
									<input type="file" id="file" name="file" accept=".csv, .txt">
                                    <input type="submit" id="submit" value="submit" class="btn btn-primary">
                                </form>
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
