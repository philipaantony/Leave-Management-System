<?php
   include 'dbconnection.php';
   $id = $_GET['val'];
   $sql = "DELETE FROM `student` WHERE id = $id ";
   mysqli_query($con,$sql);

   $sql2 = " DELETE FROM `login` WHERE sid = $id ";
   mysqli_query($con,$sql2);
   header( "Location: admin_view_student.php" ); 
   

?>