<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
</html>

<?php
    $name = $_GET["name"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "delete from member where name='$name'";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
            alert('삭제되었습니다.');
	        location.href = 'admin.php';
	     </script>
	   ";
?>

