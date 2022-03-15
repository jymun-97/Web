<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
</html>

<?php
    $title = $_GET["title"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "update events set fix = 0 where title='$title'";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	        location.href = 'admin_event.php';
	     </script>
	   ";
?>

