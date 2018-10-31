<?php
  include("Common.php");
  if(isset($_SESSION['IsLogin']))//if login send to dashboard otherwise on login page
  {
	  redirect("Dashboard.php");
  }
  else
  {
	  redirect("Login.php"); 
  }
  

?>