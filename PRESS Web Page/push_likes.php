<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];

	$con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$likes       = $row['likes'];
	$likes++;
	$sql = "update board set likes=$likes where num=$num";   
	mysqli_query($con, $sql);
	echo "
	   <script>
	    	location.href = 'board_view.php?num=$num&page=$page';
	   </script>
	";
?>