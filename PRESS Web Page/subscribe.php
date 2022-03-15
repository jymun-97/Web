<!DOCTYPE html>
<meta charset="utf-8">
<?php
	$email  = $_POST["email"];
	date_default_timezone_set('Asia/Seoul');
    $regist_day = date("Y-m-d (H:i)");

	$con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
	$sql = "insert into subscribe(email, regist_day) ";
	$sql .= "values('$email', '$regist_day')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     

    echo "
	    <script>
	    	alert('구독을 신청하였습니다.');    
	        location.href = 'index.php';
	    </script>
	  ";
?>