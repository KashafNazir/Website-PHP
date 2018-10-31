<?php
  include("Common.php");
  include("CheckLogin.php");//Open this file if the user is login
  $Status = 1;
  $RoleID=0;
  $Username = "";
  $Password = "";
  $CPassword = "";
  $Name = "";
  $CellNumber = "";
  $Email = "";
  $msg = "";
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
	//isset Determine if a variable is set and is not NULL && add form is submitted.
{	
	if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
		$Status=trim($_POST['Status']);//trim removes white spaces
	
	if(isset($_POST['RoleID']) && ctype_digit($_POST['RoleID']))
		$RoleID=trim($_POST['RoleID']);
	//It checks if all of the characters in the provided string, text, are numerical. It checks only 1...9. It returns TRUE if every character in text is a decimal digit, FALSE otherwise.RoleID is used for FK(RoleID) here as we are selecting role..
	
	if(isset($_POST['Username']))//if user has entered username then save it in this variable
		$Username=trim($_POST['Username']);
	//Similarly for all
	if(isset($_POST['Password']))
		$Password=trim($_POST['Password']);
	
	if(isset($_POST['CPassword']))
		$CPassword=trim($_POST['CPassword']);
	
	if(isset($_POST['Name']))
		$Name=trim($_POST['Name']);
	
	if(isset($_POST['CellNumber']))
		$CellNumber=trim($_POST['CellNumber']);
	
	if(isset($_POST['Email']))
		$Email=trim($_POST['Email']);
	
	if($RoleID == 0)
		//if roleID is empty generate an alert
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Select Role
		</div>';
	//Simialrly for all generate an alert if they r empty
	else if($Username == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Username
		</div>';
	else if($Password == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Password
		</div>';
		//for confirming password whether the user has entered the same password or not
	else if($Password != $CPassword)
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter the same Password
		</div>';
	else if($Name == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Name
		</div>';
	else if($CellNumber == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter CellNumber
		</div>';
	else if($Email == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Email
		</div>';
		//if all attributes are filled then add to the database
	if($msg =='')
	{
		$sql = "INSERT INTO users 
		SET 
		Status = '".$Status."',
		RoleID	= '".$RoleID."',
		Username = '".$Username."',
		Password = '".$Password."',
		Name = '".$Name."',
		CellNumber = '".$CellNumber."',
		Email = '".$Email."',
		DateAdded = NOW()
		";//NOW() is used to add the current date
		
		//if data is succesfully added the date will be added
		mysql_query($sql) or die(mysql_error());
		$msg = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Date Added
		</div>';
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Add User</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php
   include("Header.php"); 
   include("Sidebar.php"); 
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New User</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Users.php"'>Cancel</button>
            </div>
			
			<!--Form for submitting Adduser data-->
            <form role="form" action="<?php echo $self;?>" method="post">
			
			<?php
			//echo msg if any of the attribute is missing
			echo $msg;
			?>
			    <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
				  
                <div class="checkbox">
                  <label>
                    <input type="radio" name="Status" value="1"> Enable
					</label>
					</br>
					<label>
                    <input type="radio"  name="Status" value="0"> Disable
                  </label>
                </div>
                </div>
				
			    <div class="form-group"><!--To select foriegn key from another table-->
                  <label for="exampleInputEmail1"> Role</label>
					<select class="form-control" name="RoleID">
					<option value="0">Select Role</option>
					<?php
						//Query from roles table	
					$sql = "SELECT ID,RoleName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM roles WHERE ID <> 0";
					$res = mysql_query($sql) or die(mysql_error());//storing query in $res
					while($rows=mysql_fetch_array($res))
					{
					?>
					<!--using ternary operator to check whether the RoleID is equal to the Id in role table or not-->
						<option <?php echo ($RoleID == $rows['ID'] ? 'selected' : '');?>value="<?php echo $rows['ID']?>"><?php echo $rows['RoleName']?></option>
					<?php
					}
					?>
                  </select>
				  </div>
               <!--value was added for deletion work in just input fields-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="Username" value="<?php echo$Username; ?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="Password" value="<?php echo$Password; ?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Confirm Password" name="CPassword" value="<?php echo $CPassword; ?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="Name" value="<?php echo $Name; ?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">CellNumber</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter CellNumber" name="CellNumber" value="<?php echo $CellNumber; ?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="Email" value="<?php echo $Email; ?>">
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
			   <!--to submit form data-->
			  <input type="hidden" name="issubmit" value="true" />
            </form>
          </div>
        </div>     
      </div>      
    </section>   
  </div>
  <?php
 include("Footer.php");
?>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>