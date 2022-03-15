<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/activity.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
<script type="text/javascript" src="./js/login.js"></script>
</head>

<body>
	<header>
    	<?php include "header.php";?>
    </header>

	<div id= "activity_top">
		<h1>PRESS ACTIVITY</h1>
		<p>PRESS는 학기 중 월간 신문을 발간합니다.<br>
		온라인으로 PRESS 신문을 만나보세요.</p>
	</div>

	<div id= "activity_notice">
		<h1>2020년도 1학기</h1>
		<p style=" color: white;">본 학기는 코로나19로 인해 비대면 강의로 전환됨에 따라
		월간 신문을 배포하지 않습니다.</p>
		<h3 style=" color: white;">보다 정의로운 PRESS로 찾아뵙겠습니다.</h3>
	</div>

	<div id= "activity">
<?php
	$con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from activity where fix = 1";
    $result = mysqli_query($con, $sql);
    $n = mysqli_num_rows($result); // 전체 수
    for ($i = 0; $i < $n; $i++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $content = $row['content'];
        $img = "./data/";
        $img .= $row['img_copied'];
        $file = "./data/";
        $file .= $row['file_copied'];
?>
		<div id="activity_box">
    		<figure class="snip1273">
      			<img src="<?=$img?>" alt="sample72" />
      			<figcaption>
        		<h3><?=$title?></h3>
        		<p><?=$content?></p>
        		<p><img src="./img/img_down.png"></p><i class="ion-ios-arrow-right"></i>
      			</figcaption>
    			<a href="<?=$file?>"></a>
    		</figure>
  		</div>
<?php } ?>
  	</div>

	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

<style>

</style>