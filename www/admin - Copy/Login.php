<?php
include('Common.php');

$Username='';//initializing variables
$Password='';
$msg='';//for alert
//PHP $_POST is widely used to collect form data after submitting an HTML form.
// When a user submits the data by clicking on "Submit", the form data is sent to the file specified in the action attribute of the <form> tag. In this login page form, we point to the file itself for processing form data. 
	if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')//if authorized user has submitted the data
{
	if(isset($_POST['Username']))//getting username
		$Username=trim($_POST['Username']);//storing into variable
		//trim removes white spaces
	if(isset($_POST['Password']))//getting password
		$Password=trim($_POST['Password']);//storing into variable

	if($Username=='')//if username is not entered
		$msg=' Enter username';
	 else if($Password=='')//if password is not entered
		$msg='Enter password';
	
	
	
	if($msg =='')//if both are entered and no field is empty then apply select query
	{
		$sql = "SELECT ID,Username,Password,Name,Email FROM users WHERE Username = '".$Username."'";
		$res = mysql_query($sql) or die(mysql_error()); //storing the query in my sql_query and if any error arises die it
		$row = mysql_fetch_assoc($res);//fetching the whole data(all attributes) from a row		
		if($row['Password'] == $Password)//if the user password is equal to the DB row password
		{
			$_SESSION['IsLogin']=true;
			$_SESSION['UserID']=$row['ID'];//storing the row data into the session
			$_SESSION['Username']=$row['Username'];
			$_SESSION['Password']=$row['Password'];
			$_SESSION['Name']=$row['Name'];
			$_SESSION['Email']=$row['Email'];
			redirect("Dashboard.php");//if the user is authorized send to the dashboard
			//we used the func redirect  here which we have defined in the common file that's why common is added in this page
			
			
		}
		else
		{
			$msg='Invalid username / password';
		}
	}	
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Admin</b>LTE
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo $msg; ?></p>

    <form action="<?php echo $self?>"  method="post"><!--$self means redirect/process the form info on same page-->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
	  
	  <input type="hidden" name="issubmit" value="true"><!--we use the hidden type to submit form info to check if it is submitted or not-->
    </form>
  </div>
</div>

<!-- jQuery 3 -->
<script src="   bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="   bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="   plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
