<?php
  include("Common.php");
  include("CheckLogin.php");//Open this file if the user is login
  $Status = 1;
  $UserID=0;
  $Name = "";
  $Department = "";
  $ContactNumber = "";
  $Email = "";
  $Message = "";
  $msg = "";
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
	//isset Determine if a variable is set and is not NULL && add form is submitted.
{	
	if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
		$Status=trim($_POST['Status']);//trim removes white spaces
	
	if(isset($_POST['UserID']) && ctype_digit($_POST['UserID']))
		$UserID=trim($_POST['UserID']);
	//It checks if all of the characters in the provided string, text, are numerical. It checks only 1...9. It returns TRUE if every character in text is a decimal digit, FALSE otherwise.RoleID is used for FK(RoleID) here as we are selecting role..
	
	if(isset($_POST['Name']))//if user has entered username then save it in this variable
		$Name=trim($_POST['Name']);
	//Similarly for all
	if(isset($_POST['Department']))
		$Department=trim($_POST['Department']);
	
	if(isset($_POST['ContactNumber']))
		$ContactNumber=trim($_POST['ContactNumber']);
	
	if(isset($_POST['Email']))
		$Email=trim($_POST['Email']);
	
	if(isset($_POST['Message']))
		$Message=trim($_POST['Message']);
	
	if($UserID == 0)
		//if roleID is empty generate an alert
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Select User
		</div>';
	//Simialrly for all generate an alert if they r empty
	else if($Name == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Name
		</div>';
	else if($Department == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Department
		</div>';
		

	else if($ContactNumber == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter ContactNumber
		</div>';
	else if($Email == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Email
		</div>';
	else if($Message == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Message
		</div>';
		//if all attributes are filled then add to the database
	if($msg =='')
	{
		$sql = "INSERT INTO inquiries 
		SET 
		Status = '".$Status."',
		UserID	= '".$UserID."',
		Name = '".$Name."',
		Department = '".$Department."',
		ContactNumber = '".$ContactNumber."',
		Email = '".$Email."',
		Message = '".$Message."',
		DateAdded = NOW()
		";//NOW() is used to add the current date
		
		//if data is succesfully added the date will be added
		mysql_query($sql) or die(mysql_error());
		$msg = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Data Added
		</div>';
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Add Inquiries</title>
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
        Inquiries Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Inquiries</li>
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
              <h3 class="box-title">Add New Inquiry</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Inquiries.php"'>Cancel</button>
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
                  <label for="exampleInputEmail1"> User</label>
					<select class="form-control" name="UserID">
					<option value="0">Select User</option>
					<?php
						//Query from roles table	
					$sql = "SELECT ID,Username,Password,Name,CellNumber,Email,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM users WHERE ID <> 0";
					$res = mysql_query($sql) or die(mysql_error());//storing query in $res
					while($rows=mysql_fetch_array($res))
					{
					?>
					<!--using ternary operator to check whether the RoleID is equal to the Id in role table or not-->
						<option <?php echo ($UserID == $rows['ID'] ? 'selected' : '');?>value="<?php echo $rows['ID']?>"><?php echo $rows['Username']?></option>
					<?php
					}
					?>
                  </select>
				  </div>
               <!--value was added for deletion work in just input fields-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="Name" value="<?php echo$Name; ?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">Department</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Department" name="Department" value="<?php echo$Department; ?>">
                </div>


				 <div class="form-group">
                  <label for="exampleInputEmail1">ContactNumber</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter CellNumber" name="ContactNumber" value="<?php echo $ContactNumber; ?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="Email" value="<?php echo $Email; ?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Message</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="Message" value="<?php echo $Message; ?>">
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