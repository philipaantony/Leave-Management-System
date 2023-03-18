
<?php

include 'dbconnection.php';
include 'admin_header.php';
include 'admin_sidebar.php';


$id = $_GET['val'];
$sql = "SELECT * FROM `student` WHERE id = $id ";
$result = mysqli_query($con,$sql);

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$adno = $_POST['adno'];
$email=$_POST['email'];
$phno =$_POST['phoneno'];
$dept =$_POST['dept'];
$year =$_POST['adyear'];

$sql = "UPDATE `student` SET `name`='$name',`admissionno`='$adno',`email`='$email',`phoneno`='$phno',`dept`='$dept',`year`='$year' WHERE id=$id";
$res=mysqli_query($con,$sql);
if($res)
{
     echo "<script>alert('Updated Successfully')</script>";
     echo "<script>   window.location.href='admin_view_student.php'</script>";
    // header( "Location: adminhome.php" );
     
 }

else
{
 echo "<script>alert('Error...')</script>";
}
}
?>

<?php
while($row = mysqli_fetch_array($result))
  {
	    ?>

<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Student Details</h4>
                  
                  <form class="forms-sample" method="post" action ="#">


                    <div class="form-group">
                      <label for="exampleInputUsername1">Full Name</label>
                      <input type="text"  name="name"  value="<?php echo $row["name"]; ?>" class="form-control" id="exampleInputUsername1" placeholder="Username">
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Admission Number</label>
                      <input type="number"  name="adno" value="<?php echo $row["admissionno"]; ?>"  class="form-control" id="exampleInputEmail1" placeholder="Admission Number">
                    </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email"  name="email" value="<?php echo $row["email"]; ?>" class="form-control" id="exampleInputPassword1" placeholder="Email">
                    </div>


              
                    <div class="form-group">
                      <label for="exampleInputUsername1">Phone Number</label>
                      <input type="text" name="phoneno" value="<?php echo $row["phoneno"]; ?>" class="form-control" id="exampleInputUsername1" placeholder="Phone Number">
                    </div>


                    <div class="form-group">
                    <label for="exampleInputUsername1">Department</label>
                   <select name="dept"  class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option ><?php echo $row["dept"];?></option>
                    <option value="Regular MCA">Regular MCA</option>
	                  <option value="Integraded MCA">Integraded MCA</option>
	                  <option value="b.tech">b.tech</option>
                    <option value="m.tech">M.tech</option>
                  </select>
                </div>
                <div class="form-group">
                      <label for="exampleInputUsername1">Joining Year</label>
                      <input type="number" name="adyear" value="<?php echo $row["year"]; ?>"  class="form-control" id="exampleInputUsername1" placeholder="Joining Year">
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                      
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" name="submit">
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

            <?php 
  }
 
  ?>