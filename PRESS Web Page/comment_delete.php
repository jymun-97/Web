<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
</html>

<?php
    $num   = $_GET["num"];
    $page   = $_GET["page"];
    $number   = $_GET["number"];
    $ncomment   = $_GET["ncomment"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "delete from comment where num = $number";
    mysqli_query($con, $sql);

    $ncomment--;
    $sql = "update board set ncomment=$ncomment where num=$num";
    mysqli_query($con, $sql);

    echo "
	     <script>
            alert('삭제되었습니다.');
	        history.go(-1);
	     </script>
	   ";
?>

