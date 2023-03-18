<?php

include 'dbconnection.php';
include 'admin_header.php';
include 'admin_sidebar.php';

?>


<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #3C7AD5;
  color: white;
}
</style>
</head>
<body>
<center>
<br>
<br>
<br>
<table border='1' id="customers">
  <tr>
      <th> id</th>
	  <th> Name</th>
	  <th> Admission number</th>
	  <th> Email</th>
      <th> Phone number</th>
      <th> Department</th>
      <th> Admission Year</th>
	  <th>Edit</th>
	   <th>Delete</th>
  </tr>	  
  <?php 
  $result = mysqli_query($con,"SELECT * FROM `student`");
  //print_r($result);
  while($row = mysqli_fetch_array($result))
  {
	    ?>
		<tr>
		<td><?php echo $row["id"]; ?>     </td>
		<td><?php echo $row["name"];?>    </td>
		<td><?php echo $row["admissionno"];?> </td>
        <td><?php echo $row["email"];?> </td>
		<td><?php echo $row["phoneno"];?> </td>
        <td><?php echo $row["dept"];?> </td>
        <td><?php echo $row["year"];?> </td>
    <td> <a  class="btn btn-success btn-rounded btn-fw" href="admin_update_student.php?val=<?php echo $row["id"]; ?>">Update</a></td>
    <td> <a class="btn btn-danger btn-rounded btn-fw" href="admin_delete_student.php?val=<?php echo $row["id"]; ?>">Delete</a></td>
	    </tr>
		<?php 
  }

  
  ?>
</table>
<center>
    <br>
    <br>
    <br>
</body>

</html>
<?php

include 'footer.php';

?>
