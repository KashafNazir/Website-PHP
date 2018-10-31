<?php
//File copied from AddRole page
  include("Common.php");
  include("CheckLogin.php");//Open this file if the user is login
  $EID=0;//Edit ID means the record to be editted
  $Status = 1;
  $DepID =0;
  $IdeaNames = "";
  $Description = "";
  $Proposal = "";
  $TeacherAssign = "";
  $Students = "";
  $StudentNumber = "";
  $MarksObtained = "";
  $IsCompleted = 1;
  $Ratings = "";
  $msg = "";
  
  //It checks if all of the characters in the provided string, text, are numerical. It checks only 1...9. It returns TRUE if every character in text is a decimal digit, FALSE otherwise.
if(isset($_REQUEST['EID']) && ctype_digit($_REQUEST['EID']))
	  $EID = $_REQUEST['EID'];//for Edit purpose
  
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
{
	
	if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
		$Status=trim($_POST['Status']);//trim removes white spaces
	
	if(isset($_POST['DepID']) && ctype_digit($_POST['DepID']))
		$DepID=trim($_POST['DepID']);
	
	if(isset($_POST['IdeaNames']))//if user has entered ideaname then save it in this variable
		$IdeaNames=trim($_POST['IdeaNames']);
	//Similarly for all
	if(isset($_POST['Description']))
		$Description=trim($_POST['Description']);
	
	if(isset($_POST['Proposal']))
		$Proposal=trim($_POST['Proposal']);
	
	if(isset($_POST['TeacherAssign']))
		$TeacherAssign=trim($_POST['TeacherAssign']);
	
	if(isset($_POST['Students']))
		$Students=trim($_POST['Students']);
	
	if(isset($_POST['StudentNumber']))
		$StudentNumber=trim($_POST['StudentNumber']);
	
	if(isset($_POST['MarksObtained']))
		$MarksObtained=trim($_POST['MarksObtained']);
	
	if(isset($_POST['IsCompleted']) && ($_POST['IsCompleted']==1 || $_POST['IsCompleted']== 0))
		$IsCompleted=trim($_POST['IsCompleted']);
	
	if(isset($_POST['Ratings']))
		$Ratings=trim($_POST['Ratings']);
	//Similarly for all
	if($DepID == 0)
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Select Department
		</div>';
	
	else if($IdeaNames == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter IdeaNames
		</div>';
		
	else if($Description == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Description
		</div>';
		
	else if($Proposal == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter ProposalName
		</div>';

	else if($TeacherAssign == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter TeacherAssign
		</div>';

	else if($Students == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Students
		</div>';

	else if($StudentNumber == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter StudentNumber
		</div>';

	else if($MarksObtained == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter MarksObtained
		</div>';

	else if($IsCompleted == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter IsCompleted
		</div>';

	else if($Ratings == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Ratings
		</div>';

			//if all attributes are filled then update to the database
	if($msg =='')
	{
		$sql = "Update ideas 
		SET 
		Status = '".$Status."',
		DepID	= '".$DepID."',
		IdeaNames = '".$IdeaNames."',
		Description = '".$Description."',
		Proposal = '".$Proposal."',
		TeacherAssign = '".$TeacherAssign."',
		Students = '".$Students."',
		StudentNumber = '".$StudentNumber."',
		MarksObtained = '".$MarksObtained."',
		IsCompleted = '".$IsCompleted."',
		Ratings = '".$Ratings."',
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
	$sql="SELECT ID,DepID,IdeaNames,Description,Proposal,TeacherAssign,Students,StudentNumber,MarksObtained,IsCompleted,Ratings,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM ideas WHERE ID= '".$EID."'";
 $res=mysql_query($sql) or die (mysql_error());
 $rows = mysql_fetch_assoc($res);
 $Status = $rows['Status'];
 $DepID = $rows['DepID'];
 $IdeaNames = $rows['IdeaNames'];
 $Description = $rows['Description'];
 $Proposal = $rows['Proposal'];
 $TeacherAssign = $rows['TeacherAssign'];
 $Students = $rows['Students'];
 $StudentNumber = $rows['StudentNumber'];
 $MarksObtained = $rows['MarksObtained'];
 $IsCompleted = $rows['IsCompleted'];
 $Ratings = $rows['Ratings'];
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Edit Proposal</title>
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
        Proposal Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Proposal</li>
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
              <h3 class="box-title">Edit New Proposal</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Proposals.php"'>Cancel</button>
            </div>          
			<!--Form for submitting EditProposal data-->
            <form role ="form" action="<?php echo $self;?>?EID=<?php echo $EID;?>" method="post">
			
			<?php
			//echo msg if any of the attribute is missing
			echo $msg;
			?>
                <div class="form-group">
				<!--For editing data the enable or disable must be checked if it is unchecked it means u have not entered the status-->
                  <label for="exampleInputEmail1">Status</label>
				  
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
                  <label for="exampleInputEmail1"> Department </label>
					<select class="form-control" name="DepID">
					<option value="0">Select Department</option>
					<?php
							//Query from departments table
					$sql="SELECT ID,DepartmentName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM departments WHERE ID <> 0";
					$res = mysql_query($sql) or die(mysql_error());
					//storing query in $res
					while($rows=mysql_fetch_array($res))
					{
					?>
					<!--using ternary operator to check whether the DepID is equal to the Id in department table or not-->
						<option <?php echo ($DepID == $rows['ID'] ? 'selected' : '');?> value="<?php echo $rows['ID']?>"><?php echo $rows['DepartmentName']?></option>
					<?php
					}
					?>
                  </select>
				  </div>
				  <!--value was added for deletion work in just input fields-->
                <div class="form-group">				  
				  <label for="exampleInputEmail1">Idea Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Idea Name" name="IdeaNames" value="<?php echo$IdeaNames; ?>">
				  
				  <label for="exampleInputEmail1">Description</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" name="Description" value="<?php echo$Description; ?>">
				  
				  <label for="exampleInputEmail1">Proposal</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Proposal" name="Proposal" value="<?php echo$Proposal; ?>">
				  
				  <label for="exampleInputEmail1">TeacherAssign</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Teacher Assign" name="TeacherAssign" value="<?php echo $TeacherAssign; ?>">
				  
				  <label for="exampleInputEmail1">Students</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Students" name="Students"value="<?php echo $Students; ?>">
				  
				  <label for="exampleInputEmail1">StudentNumber</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Student Number" name="StudentNumber" value="<?php echo $StudentNumber; ?>">
				  
				  <label for="exampleInputEmail1">Marks Obtained</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Marks" name="MarksObtained" value="<?php echo$MarksObtained; ?>">
				  
				  <div class="form-group">
                  <label for="exampleInputEmail1">IsCompleted</label>
				  
                <div class="checkbox">
                  <label>
                    <input type="radio" name="IsCompleted" value="1"<?php echo ($Status == '1' ? 'checked':'')?>> Enable
					</label>
					</br>
					<label>
                    <input type="radio"  name="IsCompleted" value="0"<?php echo ($Status == '0' ? 'checked':'')?>> Disable
                  </label>
                </div>
                </div>
				  
				  <label for="exampleInputEmail1">Ratings</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ratings" name="Ratings" value="<?php echo $Ratings; ?>">
				  
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
