
<?php
   session_start();
   
   if(session_destroy())
    {
    	// or where we want it to go when she logs out
      header("Location: home.php");
   }
?>