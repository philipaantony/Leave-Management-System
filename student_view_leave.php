<?php
session_start();
include 'dbconnection.php';
include 'student_header.php';
include 'student_sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Applied Leaves</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>From Date</th>
                          <th> To Date</th>
                          <th>No of Days</th>
                          <th>Reason</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
  <?php 
  $name = $_SESSION['name'];
  $result = mysqli_query($con,"SELECT * FROM `leavetable` WHERE name = '$name'");
  while($row = mysqli_fetch_array($result))
  {
	    ?>
                        <tr>
                          <td class="py-1">
                          <?php echo $row["fromdate"]; ?> 
                          </td>
                          <td>
                          <?php echo $row["todate"]; ?> 
                          </td>
                          <td>
                          <?php echo $row["days"]; ?> 
                          </td>
                          <td>
                          <?php echo $row["reason"]; ?> 
                          </td>
                          <td>

                          <?php 
                          if($row["status"]=='Pending')
                          {
                            ?>
                            <label class="badge badge-danger">
                                 <?php echo $row["status"]; ?> 
                            </label>
                          <?php
                          }
                          else
                          {
                            ?>
                            <label class="badge badge-success">
                                <?php echo $row["status"]; ?> 
                            </label>
                            <?php
                          }
                          ?>
                          
                            
                         
                          </td>
                        </tr>

  <?php 
  }
  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>
