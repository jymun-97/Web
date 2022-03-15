<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
</html>

<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];

    date_default_timezone_set('Asia/Seoul');
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "update board set subject='$subject', content='$content', regist_day='$regist_day' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
              alert('수정되었습니다.');
	          location.href = 'board_form.php?page=$page';
	      </script>
	  ";
?>

   
