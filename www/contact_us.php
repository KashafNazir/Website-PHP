<?php
  include("admin/Common.php");
  $Name = "";
  $Department = "";
  $ContactNumber = "";
  $Email = "";
  $Message = "";
  $msg = "";
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
	//isset Determine if a variable is set and is not NULL && add form is submitted.
{	
	
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
		Thanks for submitting your response!!!
		</div>';
	}
	
}

?>
<html>
     <head>
	     <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
         <link href="assets/css/animate.min.css" rel="stylesheet">
		 <link href="assets/css/project.css" rel="stylesheet"/>
     </head>
     <body style="background:linear-gradient(to right,#052354, #073e99, #052354);">
	 	  <div style="background-color:#050333;margin:20px 100px 20px 100px; border-radius:10px;">		           
		        <a class="button1" href="index.php"><span style="font-size:30px;margin:20px 500px 20px 500px;text-align:center;">HOME</span></a>
			</div>
     
         <div id="contact-form" style="background-color:#050333; margin:20px 100px 20px 100px;border-radius:10px;">
		     <div class="animated fadeInDown">
		         <h1 style="color:#FFFFFF;text-align:center;padding-top:10px;">Contact Us</h1> 
		         <h4 style="color:#FFFFFF;text-align:center;padding-top:10px;">If you are interested in any project just send us an email here.
		         <br>We are here to answer any question you may have.</h4>
		         
	         </div>
			 
	         <div class="row" > <!-- data-wow-delay : delay before animation starts -->
                    <div class="col-md-8 col-sm-12 col-xs-12">
                          <div class="contact-form animated fadeInUp">
                            <form  id="contact-form" action="<?php echo $self;?>" method="post" style="background-color:#050333;" >

                                <?php
			                   //echo msg if any of the attribute is missing
			                   echo $msg;
			                   ?>

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:150px" id="form_name" type="text" name="Name" class="form-control" placeholder="Name"  data-error="Name is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:150px" id="form_dept" type="text" name="Department" class="form-control" placeholder="Department"  >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:150px" id="form_number" type="text" name="ContactNumber" class="form-control" placeholder="Contact Number" >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:150px" id="form_email" type="email" name="Email" class="form-control" placeholder="Email" >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" >
                                                <textarea style = "margin-left:150px" id="form_message" name="Message" class="form-control" placeholder="Message*"  required="required" data-error="Please,leave us a message."></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div >
                                             <button style = "margin-left:280px;" name="submit" type="submit" id="submit" >SUBMIT</button> 

                                        </div>
                                    </div>
                                </div>
                                   <input type="hidden" name="issubmit" value="true">
                            </form>

                          </div>
                     </div>
                    
	</body>
	               
</html>