<?php
session_start();
include 'dbconnection.php';
include 'student_header.php';
include 'student_sidebar.php';


if(isset($_POST['submit']))
{
  //$id = $_SESSION['id'];
  $adno = $_SESSION['adno'];
  $name = $_SESSION['name'];
  $dept =$_SESSION['dept'];

  $from=$_POST['fromdate'];
  $to = $_POST['todate'];
  $noofdate =$_POST['noofdate'];
  $reason=$_POST['reason'];
  echo $reason;

  $sql = " INSERT INTO `leavetable`(`adno`, `name`, `dept`, `fromdate`, `todate`, `days`, `reason`) VALUES ('$adno','$name','$dept','$from','$to','$noofdate','$reason')";
  $res=mysqli_query($con,$sql);
  if($res)
  {
    echo "<script>alert('Leave Applied  Successfully')</script>";
    echo "<script>   window.location.href='student_apply_leave.php'</script>";
    //header( "Location: adminhome.php" );
  }
  else{
    echo "<script>alert('Error...')</script>";
  }
 

}

?>


<!-- partial -->
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Apply Leave</h4>


                  <form method ="post" action = '#' class="form-sample">
                    <p class="card-description">
                      Fill this form please..
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">From Date:</label>
                          <div class="col-sm-9">
                            <input type="date" name="fromdate" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">To Date</label>
                          <div class="col-sm-9">
                          <input type="date" name="todate" class="form-control" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">No of Days :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="noofdate" placeholder="No of Working Days :"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Reason</label>
                          <div class="col-sm-9">
                          <textarea class="form-control" name="reason" id="exampleTextarea1" rows="4" placeholder="Enter the Reason..."></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mr-2" value="Submit">
                    <input type="reset" class="btn btn-light" value="Reset">
                  </form>
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<?php

include 'footer.php';

?>

