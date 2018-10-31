<?php
//to check if the user is not login 
  if(!isset($_SESSION['IsLogin']))
  {
	   redirect("Login.php"); //then send him to this page
  }
//if u try to open any other file(like role,addrole,editrole etc) on localhost without login it will not open and send u on the login page
?>