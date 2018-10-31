<?php
include('admin/Common.php');
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
			redirect("add_project_form.php");//if the user is authorized send to the dashboard
			//we used the func redirect  here which we have defined in the common file that's why common is added in this page
			
			
		}
		else
		{
			$msg='Invalid username / password';
		}
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
     
         <div id="contact-form" style="background-color:#050333; margin:90px 200px 90px 200px;border-radius:10px;">
		     <div class="animated fadeInDown">
			    <div >
				    <a class="button1" href="signup.php"><span style="font-size:30px;padding-left:800px;">REGISTER</span></a>
				</div>
		         <h1 style="color:#FFFFFF;text-align:center;padding-top:10px;">LOGIN</h1> 
		         <h4 style="color:#FFFFFF;text-align:center;padding-top:10px;">If you are interested to add any project just login with us here.
		         <br>We are here to add your innovation you may have.</h4>
				 <p style="text-align:justify;"><?php echo $msg; ?></p>
		         
	         </div>
			 
	         <div class="row" > <!-- data-wow-delay : delay before animation starts -->
                    <div class="col-md-8 col-sm-12 col-xs-12">
                          <div class="contact-form animated fadeInUp">
						  
                            <form  id="login-page" action="<?php echo $self?>"  method="post" style="background-color:#050333;" >

                                <div class="messages"></div>

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:220px;width:50%;" id="form_name" type="text" name="Username" class="form-control" placeholder="UserName *"  data-error="Username is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input style = "margin-left:220px;width:50%;" id="form_dept" type="password" name="Password" class="form-control" placeholder="Password*"  data-error="Password is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div >
                                             <button style = "margin-left:265px;" name="submit" type="submit" id="submit" >LOGIN</button> 

                                        </div>
                                   
                                    </div>
                                </div>
                                 <input type="hidden" name="issubmit" value="true">
                            </form>

                          </div>
                     </div>
                    
	</body>
	               
</html>