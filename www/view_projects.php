<?php
include("admin/Common.php");
  $IdeaNames = "";//initializing variables
  $Description = "";
  $Proposal = "";
  $TeacherAssign = "";
  $Students = "";
  $StudentNumber = "";
  $MarksObtained = "";
  $IsCompleted = 1;
?>
<html>
     <head>
		 <title>View Projects</title>
		
                  <!-- stylesheets css -->
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <link rel="stylesheet" href="css/animate.min.css">
		  <link rel="stylesheet" href="css/font-awesome.min.css">
		  <link rel="stylesheet" href="css/view.css">
		 
					<!-- Modal Style -->
					<!-- /* The Modal (background) */ -->
		<style>
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content 
		{
			background-color: #fefefe;
			margin: auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
		}

		/* The Close Button */
		.closeButton
		{
			
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}
		
		.closeButton:hover,
		.closeButton:focus
		{
			color: #000;
			text-decoration: none;
			cursor: pointer;
			
		}


		</style>

     </head>
     <body style="background: linear-gradient(to right, #052354, #073e99, #052354);">
	 
         <section id="team" class="parallax-section" style="background: linear-gradient(to right, #052354, #073e99, #052354);">
             <div class="container">
                 <div class="row">
				 <div style="background-color:#050333;border-radius:10px;">		           
		        <a class="button1" href="index.php"><span style="font-size:30px;margin:20px 30px 20px 30px;">HOME</span></a>
			     </div>
                      <div class="welcome-table" >
                   <div class="welcome-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
                                    <div class="welcome-text" >
                                        <h2 style="color:#000000;"><span class="bold" >Let's</span> Showcase your <span class="bold">creations</span> To Others</h2>
                                        <p style="color:#000000;">Join us in our mission to provide project <strong>#IDEAS</strong ></p>
                                        
                                    </div>
                                </div>
                           </div><!--/.row-->
                        </div><!--/.container-->
                    </div>
                </div>
                </div>
                </div>
                </div>
				<?php
				
 $sql="SELECT ID,DepartmentName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM departments WHERE ID <> 0";
 //date format is used to convert date in particular format.
 $res=mysql_query($sql) or die (mysql_error());//storing query in $res
                  while($rows=mysql_fetch_array($res))

				  {
				?>
					  <div class="col-md-offset-2 col-md-8">
                         <div class="wow fadeInUp section-title" data-wow-delay="0.3s" >
								<h2><?php echo $rows['DepartmentName'];?></h2>
								
                          </div>
                      </div>
					  <?php
				$sql1="SELECT p.ID,p.DepID,d.DepartmentName,p.IdeaNames,p.Description,p.Proposal,p.TeacherAssign,p.Students,p.StudentNumber,p.MarksObtained,p.IsCompleted,p.Ratings,p.Status,DATE_FORMAT(p.DateAdded, '%M %d %Y') as Added,DATE_FORMAT(p.DateModified, '%M %d %Y') as Modified FROM ideas p LEFT JOIN departments d ON p.DepID = d.ID WHERE p.ID <> 0 AND p.DepID = '".$rows['ID']."'";
 //date format is used to convert date in particular format.
 $res1=mysql_query($sql1) or die (mysql_error());//storing query in $res
                  while($rows1=mysql_fetch_array($res1))

				  {
				?>
					  <!--Project 1-->
					  <div class="col-md-3 wow fadeInUp" data-wow-delay="0.4s" >
						 <div class="team-thumb" id="myBtn<?php echo $rows1['ID'];?>">
							 <img src="<?php echo $rows1['Proposal'];?>"  class="img-responsive" alt="Team">  
								  <div class="team-des" >
									 <h3 ><?php echo $rows1['IdeaNames'];?></h3>
									 <h5><?php echo $rows1['DepartmentName'];?></h5>
								  </div>								  
						 </div>
						  <br>
						  <br>
						  <br>
				     </div>
					  				  
		<div id="myModal<?php echo $rows1['ID'];?>" class="modal">
               <!-- Modal content -->
         <div class="modal-content" >
              <span class="closeButton" id = "cl<?php echo $rows1['ID'];?>" >&times;</span>
              <div><p><b>IdeaName</b> : <?php echo $rows1['IdeaNames'];?><br></p></div>
              <div><p><b>Project Description</b> :<?php echo $rows1['Description'];?> </p></div>
              <div><p><b>Proposal</b>: <?php echo $rows1['Proposal'];?></p></div>
              <div><p><b>Teacher Assign</b> : <?php echo $rows1['TeacherAssign'];?></p></div>
              <div><p><b>Students</b> : <?php echo $rows1['Students'];?></p></div>
			  <div><p><b>Student Number</b> :  <?php echo $rows1['StudentNumber'];?></p></div>
              <div><p><b>Marks Obtained</b> :<?php echo $rows1['MarksObtained'];?> </p></div>
			  <div><p><b>IsCompleted</b> :<?php echo $rows1['IsCompleted'];?> </p></div>
              
         </div>
     </div>
	 
	  <script>

				// Get modal 1
				var modal<?php echo $rows1['ID'];?> = document.getElementById('myModal<?php echo $rows1['ID'];?>');

				// Get the button that opens the modal
				var btn<?php echo $rows1['ID'];?> = document.getElementById("myBtn<?php echo $rows1['ID'];?>");

				// Get the <span> element that closes the modal
				var span<?php echo $rows1['ID'];?> = document.getElementById("cl<?php echo $rows1['ID'];?>");


				// When the user clicks the button, open the modal 
				btn<?php echo $rows1['ID'];?>.onclick = function() {
					modal<?php echo $rows1['ID'];?>.style.display = "block";
					
				}

				// When the user clicks on <span> (x), close the modal
				span<?php echo $rows1['ID'];?>.onclick = function() {
					modal<?php echo $rows1['ID'];?>.style.display = "none";
					
				 }
						
				
				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal<?php echo $rows1['ID'];?>) {
						modal<?php echo $rows1['ID'];?>.style.display = "none";
					}

				}
              </script>	 
			  
			  
					<?php
				  }
					?>
                     
                 </div>
              </div>
			  
			  <?php
			  }
			  ?>
         </section>
     </body>      
</html>