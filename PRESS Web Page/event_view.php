<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/event.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
</head>
<?php
    $title = $_GET["title"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from events where title='$title'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $strdate = $row['strdate'];
    $title = $row['title'];
    $imgtitle = $row['imgtitle'];
    $content = $row['content'];
    $imgcontent = $row['imgcontent'];
    $img = "./data/";
    $img .= $row['file_copied'];

    mysqli_query($con, $sql);
    mysqli_close($con);
?>
<body>
	<header>
    	<?php include "header.php";?>
    </header>

    <div id="event_top">
    	<p><?=$strdate?> | KOREATECH PRESS</p>
    	<h2><?=$title?></h2>
    	<img src="<?=$img?>">
    </div>

    <div id="event_explain">
    	<h3>예정 날짜</h3>
    	<p><?=$strdate?> 예정<br>(변동사항 있을 수 있음)</p>

    	<br><br><br><br>

    	<h3>이벤트 소개</h3>
    	<p><?=$content?></p>

    	<button onclick="location.href='index.php'">메인으로</button>
    </div>
    <footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>