<?php
//include the files and function which are common at all pages
session_start();
include("DbConnection.php");//connectivity to database
$self = $_SERVER['PHP_SELF'];
//submit the form to the same place it came from.Can't use # bcz # doesn't submit the form at all (unless there is a submit event handler attached that handles the submission).

//$_SERVER is a PHP super global variable which holds information about headers,paths,and script locations.
 
function redirect($url)
{
	header("Location:".$url);//redirect on this particular url
}
?>