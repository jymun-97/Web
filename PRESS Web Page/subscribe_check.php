<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
</html>

<?php
    $email = $_GET["email"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "update subscribe set checked=1 where email='$email'";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	        location.href = 'admin_subscribe.php';
	     </script>
	   ";
?>
