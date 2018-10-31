<?php
  $ID= $_GET['ID'];
  $conn = mysqli_connect("localhost","root","","project");
 // Create connection
  $sql = "SELECT proposal FROM ideas WHERE ID=$ID";
  $res=mysql_query($sql) or die (mysql_error());
  $rows=mysqli_fetch_array($res);

  $conn->close();

  header("Content-type: proposal/jpeg");
  echo $row['proposal'];
?>