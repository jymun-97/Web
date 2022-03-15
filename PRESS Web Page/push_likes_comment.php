<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	$number  = $_GET["number"];

	$con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
	$sql = "select * from comment where num=$number";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$likes       = $row['likes'];
	$likes++;
	$sql = "update comment set likes=$likes where num=$number";   
	mysqli_query($con, $sql);
	echo "
	   <script>
	    	location.href = 'board_view.php?num=$num&page=$page';
	   </script>
	";
?>