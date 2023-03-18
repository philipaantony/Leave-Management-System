<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

</head>
<?php
include 'dbconnection.php';


if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $adno = $_POST['adno'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $phno =$_POST['phoneno'];
  $dept =$_POST['dept'];
  $year =$_POST['adyear'];

  $image = $_FILES['image']['name'];
  echo $image;
  $path = $_FILES['image']['tmp_name'];

  move_uploaded_file( $_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
  
  $sql = " INSERT INTO `student`( `name`, `admissionno`, `email`,`phoneno`, `dept`, `year`, `image`) VALUES ('$name','$adno','$email','$phno','$dept','$year','$image') ";
  $res=mysqli_query($con,$sql);
  

  $sql2 = "SELECT * FROM `student` WHERE email='$email'";
  $result=mysqli_query($con,$sql2);
  $row = mysqli_fetch_array($result);

  session_start();
  $_SESSION['id']=$row["id"];
  $_SESSION['adno']=$row["admissionno"];
  $_SESSION['name']=$row["name"];
  $_SESSION['email']=$row["email"];
  $_SESSION['dept']=$row["dept"];
  $_SESSION['profilepic']=$row["image"];
 

  $loginid = $row['id'];
  $loginemail = $row["email"];

  $q = "INSERT INTO `login`(`sid`, `email`, `password`) VALUES ('$loginid','$loginemail','$password')";
  $res=mysqli_query($con,$q);

  if($res)
  {
    echo "<script>alert('Registration Completed Successfully')</script>";
    echo "<script>window.location.href='student_home.php'</script>";
    //header( "Location: adminhome.php" );
  }
  else{
    echo "<script>alert('Error...')</script>";
  }





}

?>
<script>
function validateform() {
    var name = document.myform.name.value;
    var adno = document.myform.adno.value;
    var pass = document.myform.p1.value;
    var pass2 = document.myform.p2.value;
    var yr = document.myform.yr.value;
    var k = 0;


    phoneno = document.getElementById("phoneno").value
    re1 = /^[6-9]\d{9}$/;

    //name
    if (name == null || name == "" || name.length < 3) {
        // alert("Name is too short.");
        document.getElementById("namemsg").innerHTML = "**Name is too short.";
        k = 1;
        // return false;  
    } else {
        document.getElementById("namemsg").innerHTML = "";
    }

    //admission number
    if (adno == null || adno == "" || adno.length < 4) {
        // alert("Admission number shound contain 5 Digits");
        document.getElementById("admsg").innerHTML = "**Admission number shound contain 5 Digits";
        k = 1;
        //  return false;  
    } else {
        document.getElementById("admsg").innerHTML = "";
    }

    //password
    if (pass.length < 4) {
        // alert("Password length must be atleast 4 characters");
        document.getElementById("message").innerHTML = "**Password length must be atleast 5 characters";
        k = 1;
        //  return false;  
    } else {
        document.getElementById("message").innerHTML = "";
    }

    if (pass != pass2) {
        // alert("Password Mismatches....!");
        document.getElementById("message2").innerHTML = "**Password must be same";
        k = 1;
        // return false; 
    } else {
        document.getElementById("message2").innerHTML = "";
    }

    //phone
    if (!re1.test(phoneno)) {
        // alert("Invalid Phone Number");
        document.getElementById("phonesms").innerHTML = "**Invalid Phone Number";
        k = 1;
        // return false;  

    } else {
        document.getElementById("phonesms").innerHTML = "";
    }


    if (yr != '2022' && yr != '2021' && yr != '2020' && yr != '2019' && yr != '2018') {
        // alert("Invalid admission year..!(2018-2022)");
        document.getElementById("yearid").innerHTML = "**Invalid year(2018-2022)";
        k = 1;
        // return false;  
    } else {
        document.getElementById("yearid").innerHTML = "";
    }
    if (k == 1) {
        return false;
    }


}
</script>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="images/logo.svg" alt="logo">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>


                            <form class="pt-3" action="#" method="post" onsubmit="return validateform()" name="myform"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-lg" id="name"
                                        placeholder="Full Name" Required>
                                    <span id="namemsg" style="color:red"> </span>
                                </div>


                                <div class="form-group">
                                    <input type="number" name="adno" class="form-control form-control-lg" id="adno"
                                        placeholder="Admission Number" Required>
                                    <span id="admsg" style="color:red"> </span>
                                </div>


                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Email" Required>
                                </div>


                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="p1"
                                        placeholder="Set Password" Required>
                                    <span id="message" style="color:red"> </span>
                                </div>


                                <div class="form-group">
                                    <input type="password" name="cpassword" class="form-control form-control-lg" id="p2"
                                        placeholder="Confirm Password" Required>
                                    <span id="message2" style="color:red"> </span>
                                </div>


                                <div class="form-group">
                                    <input type="number" name="phoneno" id="phoneno"
                                        class="form-control form-control-lg" placeholder="Phone Number" Required>
                                    <span id="phonesms" style="color:red"> </span>
                                </div>

                                <div class="form-group">
                                    <small>Upload Profile picture</small>


                                    <input type="file" name="image">


                                    <span id="phonesms" style="color:red"> </span>
                                </div>


                                <div class="form-group">
                                    <select name="dept" class="form-control form-control-lg"
                                        id="exampleFormControlSelect2" Required>

                                        <option value="Regular MCA">Regular MCA</option>
                                        <option value="Integraded MCA">Integraded MCA</option>
                                        <option value="b.tech">b.tech</option>
                                        <option value="m.tech">M.tech</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="adyear" id='yr' type="number" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Joining Year">
                                    <span id="yearid" style="color:red"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">


                                    <input name="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit" value="SIGN UP">

                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="index.php" class="text-primary">Login</a>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
<?php
 include 'footer.php';
?>