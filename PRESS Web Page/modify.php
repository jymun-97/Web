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
    $sql = "update member set studentID='$studentID', email='$email', pass='$pass', major='$major', position='$position', regist_day='$regist_day' where name=$name";


	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'member.php';
	      </script>
	  ";
?>

   
