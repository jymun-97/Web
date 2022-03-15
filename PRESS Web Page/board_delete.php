<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
</html>

<?php
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from board where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }

    $sql = "delete from board where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
            alert('삭제되었습니다.');
	         location.href = 'board_form.php?page=$page';
	     </script>
	   ";
?>

