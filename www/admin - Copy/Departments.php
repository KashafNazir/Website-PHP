<?php
 include("Common.php");
 include("CheckLogin.php");
 $sql="SELECT ID,DepartmentName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM departments WHERE ID <> 0";
 //date format is used to convert date in particular format.
 $res=mysql_query($sql) or die (mysql_error());//storing query in $res
 //for deletion
 if(isset($_POST['fordelete']) && $_POST['fordelete']=='true')
	 //if value is not null and deletion form  is submitted
	 
 {
	$keyvalues= implode(',',$_POST['Ids']);//implode joins array elements here it will join all the desired Id's for deletion first parameter is ","
	// echo $keyvalues;
		$sql = "DELETE FROM departments WHERE ID IN (".$keyvalues.")";//WHERE ID is in this array means all selected ID's will be deleted together
		// echo $sql;
		mysql_query($sql) or die(mysql_error());
		//redirect on the same page then after deletion
		redirect($self);
	// exit();
 }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Departments</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="    bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="    bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="    bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="    bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="    dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="    dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<!--For Deletion jquery file as we have used javascript function-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--For Deletion-->
		<script>
		//we have made JS function as the delete button is out of the table
		function dodelete()
		{
			  //if the desired data for deletion is selected means checked
		  if($(".CIds").is(":checked"))
		  {
			  //then a pop up will appear asking this
			  if(confirm("Are you sure you want to delete"))
				  //if yes then deletion of frmsubmit will take place at the same form
				  $("#frmsubmit").submit();
		  }
		  else
		  {
			  alert("Please select data to delete");
		  }

		}
		//if u want to check or uncheck(delete) whole data together
		$(document).ready(function(){
			
			
			$(".CheckAll").click(function(){
				//it will check whether all properties of all CId's are checked or not
				
				$(".CIds").prop("checked",$(".CheckAll").prop("checked"));
				
			});

			
		});
		</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include("Header.php");
         include("Sidebar.php");
  ?>
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>Departments</small>
      </h1>
      <ol class="breadcrumb">
	  <!--Written in Header-->
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">departments</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
						<!---The data will be displayed on this page-->
              <h3 class="box-title">Department Management</h3>
			   <!--Add and Delete buttons-->
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="AddDepartment.php"'>Add</button>
			  <!--JS function dodelete will hit on this button-->
			  <button type="button" class="btn btn-block btn-danger" style="width: auto;margin-right: 15px;float: right;margin-top: 0px;" onclick="javascript:dodelete();">Del</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<!--Form for deletion data sumission-->
			<form id="frmsubmit" action="<?php echo $self?>" method="post">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <!--First <th> for deletion-->
				  <th><input type="checkbox" class="CheckAll"/></th>
                  <th>DepartmentName</th>
                  <th>Status</th>
				  <th>Added </th>
				  <th>Modified </th>
                </tr>
                </thead>
                <tbody>
				<?php
                 while($rows=mysql_fetch_array($res))
					 //The mysql_fetch_array() is used to retrieve a row of data as an array from a MySQL result handle.
				 {					 
				 ?>
                <tr>
                 <!--First <td> for deletion purpose-->
				 <td><input type="checkbox" class="CIds" name="Ids[]" value="<?php echo $rows['ID']?>"/></td>
				 <td><?php echo $rows['DepartmentName']?></td>
                  <td><?php echo $rows ['Status']?></td>
				  <td><?php echo $rows['Added']?> </td>
				  <td><?php echo $rows['Modified']?> </td>
				  <td> <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="EditDepartment.php?EID=<?php echo $rows['ID']?>"'>Edit</button></td><!--button for edit -->
                  <!--to edit a particular row-->
                </tr>
				 <?php 
				 }
				 ?>
                </tbody>
                <tfoot>
                <tr>
				<!--First and last <th> for deletion purpose-->
				  <th></th>
                  <th>DepartmentName</th>
                  <th>Status</th>
				  <th>Added </th>
				  <th>Modified </th>
				  <th></th>
                </tr>
                </tfoot>
              </table>
			  <!--For deletion form--->
			  <input type="hidden" name="fordelete" value="true"/>
			  </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  </div>
		  </section>
		  </div>
		  </div>

          
  <!-- /.content-wrapper -->
<?php 
 include("Footer.php");
 ?>
</div>

<!-- jQuery 3 -->
<script src="    bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="    bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="    bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="    bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="    bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="    bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="    dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="    dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
