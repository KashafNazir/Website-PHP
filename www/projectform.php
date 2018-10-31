<html>
     <head>
	     <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
		 <link href="assets/css/project.css" rel="stylesheet"/>
		 <link href="assets/css/animate.min.css" rel="stylesheet">
     </head>
     <body style="background-color: #c0c3c6;">
         <div id="contact-form" style="background-color:#57c1a0; margin:20px 100px 20px 100px;border-radius:10px;">
		     <div class="animated fadeInDown">
		         <h1 style="color:#000000;text-align:center;padding-top:10px;">Add your Project!</h1> 
		         <h4 style="color:#000000;text-align:center;padding-top:10px;font-size:20px;">Share your project ideas with others.Showcase your innovation.</h4> 
	         </div>
			 <p id="failure">Oopsie...message not sent.</p>  
		      <p id="success">Your message was sent successfully. Thank you!</p>
	         <form method="post" action="/" class="animated fadeInUp">
			     <div style="padding-left:200px;padding-right:200px;">
		             <label for="prjct">
		      	         <span class="required" >Project Title: *</span> 
		      	         <input type="text" id="prjct" name="prjct"  placeholder="Project Title" size="80"required="required" tabindex="1" autofocus="autofocus" />
		             </label> 
			     </div>
				 <div>
				     <h4 style="color:#000000;text-align:center;font-size:20px;">Choose any of the following format to upload your Project IDEA.</h4>
				 </div>
				 <div style="padding-left:200px;padding-right:0px;">
		             <label for="uploadfile">
		      	         <span class="required" >Upload Project File:</span> 
		      	         <input type="file" id="uploadfile" name="file" accept=".doc/*" size="80" tabindex="1" autofocus="autofocus" style="width:135%;" />
		             </label> 
			     </div>
				 <div style="padding-left:200px;padding-right:200px;">
		             <label for="uploadvideo">
		      	         <span class="required" >Upload Project Video:</span> 
		      	         <input type="file" id="uploadvideo" name="video" accept="video/*" size="80" tabindex="1" autofocus="autofocus" style="width:135%;"/>
		             </label> 
			     </div>
				 <div style="padding-left:200px;padding-right:200px;">
		             <label for="uploadimg">
		      	         <span class="required" >Upload Project Image:</span> 
		      	         <input type="file" id="uploadimg" name="pic" accept="image/*" size="80" tabindex="1" autofocus="autofocus" style="width:135%;"/>
		             </label> 
			     </div>
				 <div style="padding-left:200px;"">
		             <label for="uploadurl">
		      	         <span class="required" >Upload Project URL:</span> 
		      	         <input type="url" id="uploadurl" name="homepage"   tabindex="1" autofocus="autofocus" style="width:109%;"/>
		             </label> 
			     </div>
			     <div style="padding-left:200px;padding-right:200px;">		          
		             <label for="prjctdes">
		      	         <span class="required">Project Description: *</span> 
		      	         <textarea id="prjctdes" name="prjctdes" placeholder="Please write your Project Description here." tabindex="5" rows="6" cols="85" required="required"></textarea> 
		             </label>  
			     </div>
			     <div style="padding-left:200px;padding-right:200px;">		          
		              <label for="subject">
		                 <span class="required">Department: * </span><br>
			             <select id="dept" name="dept" tabindex="4" style="width:475px;">   
			                 <option value="SE">Software Engineering</option>
			                 <option value="TX">Computer and information System Engineering</option>
			                 <option value="CH">Chemical Engineering </option>
					         <option value="TE">Telecommmunication Engineering</option>
					         <option value="ME">Mechanical Engineering</option>
					         <option value="EL">Electronics Engineering</option>
			                 <option value="CE">Civil Engineering </option>
			             </select>
		             </label>
			     </div>
			     <div style="padding-left:200px;padding-right:200px;">
		             <label for="name">
		               	 <span class="required">Project Supervisor: *</span> 
		      	         <input type="text" id="prjctspr" name="prjctspr" placeholder="Your Project Supervisor" size="80" required="required" tabindex="1" autofocus="autofocus" />
		             </label> 
			     </div>
				 <div style="padding-left:200px;padding-right:200px;">
		             <label for="prjct">
		      	         <span class="required" >Students: *</span> 
		      	         <input type="text" id="prjct" name="prjct"  placeholder="Project Title" size="80"required="required" tabindex="1" autofocus="autofocus" />
		             </label> 
			     </div>
			<div style="padding-left:200px;padding-right:200px;">
		      <label for="name">
		      	<span class="required">Team Members: *</span> 
		      	<input type="text" id="tm1" name="tm1"  placeholder="Enter Team Member Name" size="80" required="required" tabindex="1" autofocus="autofocus" />
		      </label> 
			</div>
			<div style="padding-left:200px;padding-right:200px;">
		            <label for="prjct">
		      	         <span class="required" >MarksObtained: *</span> 
		      	         <input type="text" id="prjct" name="prjct"  placeholder="Project Title" size="80"required="required" tabindex="1" autofocus="autofocus" />
		             </label> 
			</div>
		    <div style="padding-left:200px;padding-right:200px;">
		             <label for="prjct">
		      	         <span class="required" >IsCompleted: *</span> 
		      	         <input type="text" id="prjct" name="prjct"  placeholder="Project Title" size="80"required="required" tabindex="1" autofocus="autofocus" />
		             </label> 
			 </div>
			
			<div style="padding-left:200px;padding-right:200px;">
		      <label for="email">
		      	<span class="required">Email: *</span>
		      	<input type="email" id="email" name="email"  placeholder="Your Email" size="85" required="required" tabindex="2"  />
		      </label>
			  <br>
              <label for="contact no">
		      	<span class="required">Contact Number:*</span>
		      	<input type="contact" id="contact" name="contact"  placeholder="Your Contact Number" size="80" required="required" tabindex="2"  />
		      </label> 			  
			</div>
			<div>		           
		        <button name="submit" type="submit" id="submit" style="margin-left:300px; margin-bottom:20px;">SUBMIT</button> 
			</div>
			
			 </form>
         </div>
	</body>
</html>