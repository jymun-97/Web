<!DOCTYPE html>
<meta charset="utf-8">
<?php
    $name = $_POST["name"];
    $studentID = $_POST["studentID"];
    $email  = $_POST["email"];
    $pass = $_POST["pass"];
    $major = $_POST["major"];
    $position = $_POST["position"];
    date_default_timezone_set('Asia/Seoul');
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

              
    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");

	$sql = "insert into member(name, studentID, email, pass, major, position) ";
	$sql .= "values('$name', '$studentID', '$email', '$pass', '$major', '$position')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     

    echo "
	    <script>
            alert('정상적으로 가입되었습니다.');    
	        location.href = 'index.php';
	    </script>
	  ";
?>

   
