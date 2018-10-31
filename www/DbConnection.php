<?php
  //connectivity to database
  $Host='localhost';//where ur website will be hosted
  $User='root';//root is the user name or account that by default has access to all commands and files of database
  $Password='';//No password right now to login to database.You can set your own password
  $Database='project';//DB name
   
 mysql_connect($Host,$User,$Password);//to connect to database
 mysql_select_db($Database);//selecting the required database

?>
