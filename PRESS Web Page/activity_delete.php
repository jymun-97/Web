<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
</html>

<?php
    $title = $_GET["title"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "delete from activity where title='$title'";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
            alert('삭제되었습니다.');
	        location.href = 'admin_activity.php';
	     </script>
	   ";
?>

