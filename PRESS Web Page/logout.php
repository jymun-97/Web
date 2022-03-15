<?php
  session_start();
  unset($_SESSION["username"]);
  unset($_SESSION["usermajor"]);
  unset($_SESSION["userposition"]);
  
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
