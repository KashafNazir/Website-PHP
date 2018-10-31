<?php
   include('Common.php');
   include('DbConnection.php');//connectivity to database
   session_destroy(); //to come out of the session session close it
   redirect("Login.php");//again come back to the login page we used the func redirect  here which we have defined in the common file that's why common is added in this page
    
	

?>