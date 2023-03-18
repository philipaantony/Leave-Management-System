<?php

include 'dbconnection.php';

$id = $_GET['val'];
$sql = "UPDATE `leavetable` SET `status`='Leave Aproved' WHERE id='$id'";
$result = mysqli_query($con,$sql);
header( "Location: admin_view_request.php" ); 

?>