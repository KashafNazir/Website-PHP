<?php
  include("admin/Common.php");
  include('CheckLogin.php');
  $DepID =0;
  $IdeaNames = "";//initializing variables
  $Description = "";
  $Proposal = "";
  $TeacherAssign = "";
  $Students = "";
  $StudentNumber = "";
  $MarksObtained = "";
  $IsCompleted = 1;
  $Ratings = "";
  $tm1 = "";
  $tm2 = "";
  $tm3 = "";
  $cnt1 = "";
  $cnt2 = "";
  $cnt3 = "";
  $msg = "";
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
	//isset Determine if a variable is set and is not NULL && add form is submitted.
{
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
	
	if(isset($_POST['tm1']))
		$tm1=trim($_POST['tm1']);
	
	if(isset($_POST['tm2']))
		$tm2=trim($_POST['tm2']);
	
	if(isset($_POST['tm3']))
		$tm3=trim($_POST['tm3']);
	
	if(isset($_POST['cnt1']))
		$cnt1=trim($_POST['cnt1']);
	
	if(isset($_POST['cnt2']))
		$cnt2=trim($_POST['cnt2']);
	
	if(isset($_POST['cnt3']))
		$cnt3=trim($_POST['cnt3']);
	
	if($DepID == 0)
		//if DepID is empty generate an alert
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Select Department
		</div>';
	//Simialrly for all generate an alert if they r empty
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
		 Please Enter Proposal
		 </div>';

	else if($TeacherAssign == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter TeacherAssign
		</div>';

	else if($tm1 == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Team Member 1
		</div>';
	else if($tm2 == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Team Member 2
		</div>';
	else if($tm2 == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Team Member 3
		</div>';

	else if($cnt1 == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter StudentNumber 1
		</div>';
		
	else if($cnt2 == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter StudentNumber 2
		</div>';
		
	else if($cnt3 == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter StudentNumber 3
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

		
	if($msg =='')
		//if all attributes are filled then add to the database
	{
		$StudentNumber = $cnt1.','.$cnt2.','.$cnt3;
		$tmnames = $tm1.','.$tm2.','.$tm3;
		$sql = "INSERT INTO ideas 
		SET 
		DepID	= '".$DepID."',
		IdeaNames = '".$IdeaNames."',
		Description = '".$Description."',
		Proposal = 'images/".$Proposal."',
		TeacherAssign = '".$TeacherAssign."',
		Students = '".$tmnames."',
		StudentNumber = '".$StudentNumber."',
		MarksObtained = '".$MarksObtained."',
		IsCompleted = '".$IsCompleted."',
	    Ratings = '".$Ratings."',
		DateAdded = NOW()
		
		";//NOW() is used to add the current date

		//if data is succesfully added the date will be added
		
		mysql_query($sql) or die(mysql_error());
		$msg = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Thanks for submitting project!!!Your project has been successfully added..
		</div>';
	}
	
}

?>
<html>
     <head>
	     <meta charset="utf-8">
         <link href="style.css" rel="stylesheet"/>
		 <link href="css/font-awesome.min.css"  rel="stylesheet">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
		 <link href="assets/css/project.css" rel="stylesheet"/>
     </head>
	 
     <body style="background: linear-gradient(to right,#052354,#073e99,#052354);">
	         <div style="background-color:#050333; margin:20px 100px 20px 100px;border-radius:10px;">		           
		        <a class="button1" href="index.php"><span style="font-size:20px;">HOME</span></a>
			</div>
         <div id="contact-form" style="background-color:#050333; margin:20px 100px 20px 100px;border-radius:10px;">
		     <div>
		         <h1 style="color:#FFFFFF;font-family:georgia;text-align:center;padding-top:50px;"><u>Add your Project!</u></h1> 
		         <h4 style="color:#FFFFFF;font-family:georgia;text-align:center;padding-top:10px;font-size:20px;">Share your project ideas with others.Showcase your innovation.</h4> 
	         </div>
			 
	         <form role ="form" action="<?php echo $self;?>" method="post">
			 <?php
			//echo msg if any of the attribute is missing
			echo $msg;
			?>
			     <div style="padding-left:200px;padding-right:200px;">
		             <label for="prjct">
		      	         <span class="required" >Project Title: *</span> 
		      	         <input type="text" id="prjct" name="IdeaNames"  placeholder="Project Title" size="80"required="required" tabindex="1" autofocus="autofocus" value="<?php echo $IdeaNames; ?>" />
		             </label> 
			     </div>

				 <div style="padding-left:200px;padding-right:200px;">
		             <label for="uploadimg">
		      	         <span class="required" >Upload Project Image:</span> 
		      	         <input type="file" id="uploadimg" name="Proposal" accept="image/*" size="80" tabindex="1" autofocus="autofocus" style="width:168%;" value="<?php echo $Proposal; ?>"/>
		             </label> 
			     </div>

				
			     <div style="padding-left:200px;padding-right:200px;">		          
		             <label for="prjctdes">
		      	         <span class="required">Project Description: *</span> 
		      	         <textarea id="prjctdes" name="Description" placeholder="Please write your Project Description here." tabindex="5" rows="6" cols="85" required="required" value="<?php echo $Description; ?>"></textarea> 
		             </label>  
			     </div>
			     <div style="padding-left:200px;padding-right:200px;">		          
		              <label for="subject">
		                 <span class="required">Department: * </span><br>
			             <select id="dept" name="DepID" tabindex="4" style="width:750px;"> 
                             <option value="0">Select Department</option>						 
			                 <?php
							//Query from departments table
								$sql="SELECT ID,DepartmentName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM departments WHERE ID <> 0";
								$res = mysql_query($sql) or die(mysql_error());
								while($rows=mysql_fetch_array($res))
								{
								?>
								<!--using ternary operator to check whether the DepID is equal to the Id in department table or not-->
									<option <?php echo ($DepID == $rows['ID'] ? 'selected' : '');?> value="<?php echo $rows['ID']?>"><?php echo $rows['DepartmentName']?></option>
								<?php
								}
								?>
			             </select>
		             </label>
			     </div>
			     <div style="padding-left:200px;padding-right:200px;">
		             <label for="name">
		               	 <span class="required">Project Supervisor: *</span> 
		      	         <input type="text" id="prjctspr" name="TeacherAssign" placeholder="Your Project Supervisor" size="80" required="required" tabindex="1" autofocus="autofocus" value="<?php echo $TeacherAssign; ?>"/>
		             </label> 
			     </div>
	
			<div style="padding-left:200px;padding-right:200px;">
		      <label for="name">
		      	<span class="required">Team Member 1: *</span> 
		      	<input type="text" id="tm1" name="tm1"  placeholder="Enter Team Member Names" size="80" required="required" tabindex="1" autofocus="autofocus" value="<?php echo $tm1; ?>" />
		      </label> 
			</div>
			<div style="padding-left:200px;padding-right:200px;">
		      <label for="name">
		      	<span class="required">Team Member 2: *</span> 
		      	<input type="text" id="tm1" name="tm2"  placeholder="Enter Team Member Names" size="80" required="required" tabindex="1" autofocus="autofocus" value="<?php echo $tm2; ?>" />
		      </label> 
			</div>
			<div style="padding-left:200px;padding-right:200px;">
		      <label for="name">
		      	<span class="required">Team Member 3: *</span> 
		      	<input type="text" id="tm1" name="tm3"  placeholder="Enter Team Member Names" size="80" required="required" tabindex="1" autofocus="autofocus"value="<?php echo $tm3; ?>" />
		      </label> 
			</div>
			<div style="padding-left:200px;padding-right:200px;">
		            <label for="prjct">
		      	         <span class="required" >MarksObtained: *</span> 
		      	         <input type="text" id="prjct" name="MarksObtained"  placeholder="Enter Marks Obtained " size="80"required="required" tabindex="1" autofocus="autofocus"value="<?php echo $MarksObtained; ?>" />
		             </label> 
			</div>
		    <div style="padding-left:200px;padding-right:200px;">
		             <label for="prjct">
		      	         <span class="required" >IsCompleted: *</span> 
		      	         <input type="text" id="prjct" name="IsCompleted"  placeholder="Is your project completed or not? Add 1 or 0" size="80"required="required" tabindex="1" autofocus="autofocus" value="<?php echo $IsCompleted; ?>" />
		             </label> 
			 </div>
			
			<div style="padding-left:200px;padding-right:200px;">
		     
              <label for="contact no">
		      	<span class="required">Contact Number 1: *</span>
		      	<input type="contact" id="contact" name="cnt1"  placeholder="Your Contact Number" size="80" required="required" tabindex="2"  value="<?php echo $cnt1; ?>"/>
		      </label> 			  
			</div>
						<div style="padding-left:200px;padding-right:200px;">
		     
              <label for="contact no">
		      	<span class="required">Contact Number 2: *</span>
		      	<input type="contact" id="contact" name="cnt2"  placeholder="Your Contact Number" size="80" required="required" tabindex="2" value="<?php echo $cnt2; ?>" />
		      </label> 			  
			</div>
						<div style="padding-left:200px;padding-right:200px;">
		     
              <label for="contact no">
		      	<span class="required">Contact Number 3: *</span>
		      	<input type="contact" id="contact" name="cnt3"  placeholder="Your Contact Number" size="80" required="required" tabindex="2"  value="<?php echo $cnt3; ?>"/>
		      </label> 			  
			</div>
			<div>		           
		        <button name="submit" type="submit" id="submit" >SUBMIT</button> 
			</div>
			<input type="hidden" name="issubmit" value="true">
			 </form>
         </div>
		 
	</body>
</html>