<?php

session_start();
include 'dbconnection.php';
include 'student_header.php';
include 'student_sidebar.php';


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
$imgurl= $_POST['img1'];
$path = $_FILES['img']['tmp_name'];
$image = $_FILES['img']['name'];
echo $image;
echo $imgurl;

if($image=='')
    {
         $sql = "UPDATE `student` SET `name`='$name',`admissionno`='$adno',`email`='$email',`phoneno`='$phno',`dept`='$dept',`year`='$year',`image`='$imgurl' WHERE id=$id";
    }
else
	{
		 unlink(realpath("uploads/".$_POST['img1']));
		 move_uploaded_file( $_FILES['img']['tmp_name'],"uploads/".$_FILES['img']['name']);
         session_start();
         $_SESSION['profilepic']=$image;
		 $sql = "UPDATE `student` SET `name`='$name',`admissionno`='$adno',`email`='$email',`phoneno`='$phno',`dept`='$dept',`year`='$year',`image`='$image' WHERE id=$id";
		 	
	}


$res=mysqli_query($con,$sql);
if($res)
{
     echo "<script>alert('Updated Successfully')</script>";
     echo "<script>   window.location.href='student_home.php'</script>";

     
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
                        <h4 class="card-title">Update Your Details</h4>

                        <form class="forms-sample" method="post" action="#" enctype="multipart/form-data">


                            <div class="form-group">
                                <label for="exampleInputUsername1">Full Name</label>
                                <input type="text" name="name" value="<?php echo $row["name"]; ?>" class="form-control"
                                    id="exampleInputUsername1" placeholder="Username">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Admission Number</label>
                                <input type="number" name="adno" value="<?php echo $row["admissionno"]; ?>"
                                    class="form-control" id="exampleInputEmail1" placeholder="Admission Number">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" name="email" value="<?php echo $row["email"]; ?>"
                                    class="form-control" id="exampleInputPassword1" placeholder="Email">
                            </div>



                            <div class="form-group">
                                <label for="exampleInputUsername1">Phone Number</label>
                                <input type="text" name="phoneno" value="<?php echo $row["phoneno"]; ?>"
                                    class="form-control" id="exampleInputUsername1" placeholder="Phone Number">
                            </div>



                            <div class="form-group">
                                <small>Upload Profile picture</small>
                                <input type="file" name="img">
                                <input type="hidden" name="img1" value="<?php echo $row["image"];?> ">
                                <img src="uploads/<?php echo $row["image"];?> " width="50px" height="50px">
                                <span id="phonesms" style="color:red"> </span>
                            </div>




                            <div class="form-group">
                                <label for="exampleInputUsername1">Department</label>
                                <select name="dept" class="form-control form-control-lg" id="exampleFormControlSelect2">
                                    <option><?php echo $row["dept"];?></option>
                                    <option value="Regular MCA">Regular MCA</option>
                                    <option value="Integraded MCA">Integraded MCA</option>
                                    <option value="b.tech">b.tech</option>
                                    <option value="m.tech">M.tech</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Joining Year</label>
                                <input type="number" name="adyear" value="<?php echo $row["year"]; ?>"
                                    class="form-control" id="exampleInputUsername1" placeholder="Joining Year">
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
            <?php

include 'footer.php';

?>