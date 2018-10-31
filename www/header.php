<html>
<body>
		   <div class="headerdiv">
				 <div class="col-md-3">
					 <img src="logo.jpg" style="height:90px;"/>
				 </div>
				 <div class="col-md-9">
				     <ul id="menu">
					     <li>
							 <a href="index.php">HOME</a>
						 </li>
						 <li>
							 <a href="about_us.php">ABOUT US</a>
						 </li>
						 <li>
							 <a href="add_projects.php">ADD PROJECTS</a>
						 </li>
						 <li>
						<a href="view_projects.php">VIEW PROJECTS</a>
						 </li>
						 <li>
							 <a href="contact_us.php">CONTACT US</a>
						 </li>
						 <?php 
						if(!isset($_SESSION['IsLogin']))
						{
							?>
							
						 <li>
							 <a href="login.php">LOG IN</a>
						 </li>
						 <li>
							 <a href="signup.php">REGISTER</a>
						 </li>
							<?php
						}
						else
						{
							?>
							
						 <li>
							 <a href="logout.php">LOGOUT</a>
						 </li>
							<?php
						}
						 ?>
					 </ul>
				 </div>
			 </div>
			 </body>
			 </html>