<?php
  include("admin/Common.php");
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
		// echo $msg;
		$sql = "INSERT INTO users 
		SET 
		
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
		Your Account has been successfully created you can now add and view projects!!
		</div>';
	}
	// redirect($self);
// echo $sql;
	// exit();
	
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
         <div id="contact-form" style="background-color:#050333; margin:90px 200px 90px 200px;border-radius:10px;">
		     <div class="animated fadeInDown">
		         <h1 style="color:#FFFFFF;text-align:center;padding-top:10px;">SIGNUP</h1> 
		         <h4 style="color:#FFFFFF;text-align:center;padding-top:10px;">If you are interested to add any project just signup with us here.
		         <br>We are here to add your innovation you may have.</h4>
		         
	         </div>
			 
	         <div class="row" > <!-- data-wow-delay : delay before animation starts -->
                    <div class="col-md-8 col-sm-12 col-xs-12">
                          <div class="contact-form animated fadeInUp">
                            <form  id="signup-page"  action="<?php echo $self;?>" method="post" style="background-color:#050333;" >
                              <?php
			                   //echo msg if any of the attribute is missing
			                   echo $msg;
			                   ?>
                                

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:220px;width:50%;" id="form_username" type="text" name="Username" class="form-control" placeholder="UserName *"  data-error="Username is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:220px;width:50%;" id="form_pswd" type="password" name="Password" class="form-control" placeholder="Password *" data-error="Password is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
								    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:220px;width:50%;" id="form_dept" type="password" name="CPassword" class="form-control" placeholder="ConfirmPassword *"  data-error="ConfirmPassword is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
									 <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:220px;width:50%;" id="form_name" type="text" name="Name" class="form-control" placeholder="Name *"  data-error="Name is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
			                         <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:220px;width:50%;" id="form_name" type="text" name="CellNumber" class="form-control" placeholder="CellNumber *"  data-error="CellNumber is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
   
							
									 <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:220px;width:50%;" id="form_name" type="text" name="Email" class="form-control" placeholder="Email *" data-error="Email is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
		
                                    <div >
                                             <button style = "margin-left:265px;" name="submit" type="submit" id="submit" >SIGN UP</button> 

                                        </div>
                                   
                                  </div>
                                
                                 <input type="hidden" name="issubmit" value="true">
                            </form>
					</div>
                 </div>
             </div>
        </div>
                    
	</body>
	               
</html>