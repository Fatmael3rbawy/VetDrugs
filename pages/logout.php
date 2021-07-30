<?php
 session_destroy();
 setcookie("usercookie" ,"" , time()-1);
 echo("<script>window.open ('index.php','_self')</script>");



?>