<?php
//File copied from AddRole page
  include("Common.php");
  include("CheckLogin.php");//Open this file if the user is login
  $EID=0;//Edit ID means the record to be editted
  $Status =1;
  $RoleID=0;
  $Username = "";
  $Password = "";
  $CPassword = "";
  $Name = "";
  $CellNumber = "";
  $Email = "";
  $msg = "";
  
  //It checks if all of the characters in the provided string, text, are numerical. It checks only 1...9. It returns TRUE if every character in text is a decimal digit, FALSE otherwise.
if(isset($_REQUEST['EID']) && ctype_digit($_REQUEST['EID']))
	  $EID = $_REQUEST['EID'];//for Edit purpose
  
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
{
	
	if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
		$Status=trim($_POST['Status']);//trim removes white spaces
	
	if(isset($_POST['RoleID']) && ctype_digit($_POST['RoleID']))
		$RoleID=trim($_POST['RoleID']);//for selection of foreign key purpose
	
	//if user has entered username then save it in this variable
	if(isset($_POST['Username']))
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
	//Similarly for all
	if($RoleID == 0)
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Select Role
		</div>';
	
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
			//if all attributes are filled then update to the database
	if($msg =='')
	{
		$sql = "UPDATE users 
		SET 
		Status = '".$Status."',
		RoleID	= '".$RoleID."',
		Username = '".$Username."',
		Password = '".$Password."',
		Name = '".$Name."',
		CellNumber = '".$CellNumber."',
		Email = '".$Email."',
		DateModified = NOW()
		WHERE ID = '".$EID."'   
		";
		//NOW() is used to add the current date
		
		//if data is succesfully added the date will be added
		mysql_query($sql) or die(mysql_error());
		$msg = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Data Modified
		</div>';
	}
}
else
{
	 $sql="SELECT ID,Name,Password,Email,CellNumber,Username,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified,RoleID FROM users WHERE ID= '".$EID."'";
 $res=mysql_query($sql) or die (mysql_error());
 $rows = mysql_fetch_assoc($res);
 $Status = $rows['Status'];
 $RoleID = $rows['RoleID'];
 $Username = $rows['Username'];
 $Password = $rows['Password'];
 $Name = $rows['Name'];
 $CellNumber = $rows['CellNumber'];
 $Email = $rows['Email'];
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Edit User</title>
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
        <li class="active">Edit User</li>
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
              <h3 class="box-title">Edit New User</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Users.php"'>Cancel</button>
            </div>
            
			<!--Form for submitting EditUser data-->
            <form role="form" action="<?php echo $self;?>?EID=<?php echo $EID;?>" method="post">
			
			<?php
			//echo msg if any of the attribute is missing
			echo $msg;
			?>
			    <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
				  <!--For editing data the enable or disable must be checked if it is unchecked it means u have not entered the status-->
                <div class="checkbox">
                  <label>
                    <input type="radio" name="Status" value="1"<?php echo ($Status == '1' ? 'checked':'')?>> Enable
					</label>
					</br>
					<label>
                    <input type="radio"  name="Status" value="0"<?php echo ($Status == '0' ? 'checked':'')?>> Disable
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
						<option <?php echo ($RoleID == $rows['ID'] ? 'selected' : '');?> value="<?php echo $rows['ID']?>"><?php echo $rows['RoleName']?></option>
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
