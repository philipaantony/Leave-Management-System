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


if(isset($_POST['login']))
{

  $email=$_POST['email'];
  $pass = $_POST['password'];

  $q = " SELECT `id`, `sid`, `email`, `password`, `type` FROM `login` WHERE  email='$email' and password='$pass'";
  $result=mysqli_query($con,$q);
  if (mysqli_num_rows($result)>0)
  {

    $row = mysqli_fetch_array($result);
    $type = $row['type'];
    if($type=="admin")
    {
      session_start();
      $_SESSION['name']='admin';
      $_SESSION['email']=$row['email'];
      echo "<script>alert(\"WELCOME ADMIN\");</script>";
      echo "<script>window.location.href='adminhome.php'</script>";
    }
    else
    {
      session_start();
      $em = $row['email'];
      $sql2 = "SELECT * FROM `student` WHERE email='$em'";
      $result=mysqli_query($con,$sql2);
      $r = mysqli_fetch_array($result);

      $_SESSION['id']= $r['id'];
      $_SESSION['adno']=$r["admissionno"];
      $_SESSION['name']= $r['name'];
      $_SESSION['email']=$r['email'];
      $_SESSION['dept']=$r["dept"];
      $_SESSION['profilepic']=$r["image"];
    

      echo "<script>alert(\"LOGIN SUCCESSFULL\");</script>";
      echo "<script>window.location.href='student_home.php'</script>";
      //header("");

    }
  }
  else
    {
    echo "<script>
     alert(\"INVALID USERNAME OR PASSWORD \");
     </script>";
    }
 

}

?>

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
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>


                            <form class="pt-3" method='post' action='#'>


                                <div class="form-group">
                                    <input type="email" name='email' class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Email" Required>
                                </div>


                                <div class="form-group">
                                    <input type="password" name='password' class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" Required>
                                </div>


                                <div class="mt-3">
                                    <input type='submit' name='login' value='SIGN IN'
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                </div>

                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="ti-facebook mr-2"></i>Connect using facebook
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register.php" class="text-primary">Create</a>
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