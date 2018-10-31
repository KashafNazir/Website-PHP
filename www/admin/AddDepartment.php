<?php
  include("Common.php");
  include("CheckLogin.php");//Open this file if the user is login
  $Status = 1;//initializing variables
  $DepartmentName = "";
  $msg = "";//for alert
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
	//isset Determine if a variable is set and is not NULL && add form is submitted.
{	
	if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
		$Status=trim($_POST['Status']);//trim removes white spaces
	
	if(isset($_POST['DepartmentName']))
		$DepartmentName=trim($_POST['DepartmentName']);//if user has entered departmentName then save it in this variable
	
	if($DepartmentName == '')
		//if department name is empty generate an alert
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter DepartmentName
		</div>';
		//if all attributes are filled then add to the database
	if($msg =='')
	{
		$sql = "INSERT INTO departments 
		SET 
		Status = '".$Status."',
		DepartmentName = '".$DepartmentName."',
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
  <title>Admin | Add Department</title>
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
        Department Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Department</li>
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
              <h3 class="box-title">Add New Department</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Departments.php"'>Cancel</button>
            </div>
           
			<!--Form for submitting AddDepartment data-->
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
				<!--value was added for deletion work in just input fields-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Department Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Department Name" name="DepartmentName" value="<?php echo $DepartmentName; ?>">
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