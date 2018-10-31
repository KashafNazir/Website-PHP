<?php
session_start();//session variables are not passed individually to each new page, instead they are retrieved from the session we open at the beginning of each page (session_start()).
print_r($_SESSION);//The Print_r () PHP function is used to return an array in a human readable form.

//$_SESSION is a global variable to access the info as long as we are in a session.

//When you work with an application, you open it, do some changes, and then you close it. This is much like a Session. The computer knows who you are. It knows when you start the application and when you end. But on the internet there is one problem: the web server does not know who you are or what you do, because the HTTP address doesn't maintain state.

//Session variables solve this problem by storing user information to be used across multiple pages (e.g. username, favorite color, etc). By default, session variables last until the user closes the browser.

?>