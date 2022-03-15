<!DOCTYPE html>
<meta charset="utf-8">
<?php
    $strdate = $_POST["event_date"];
    $title = $_POST["event_title"];
    $imgtitle = $_POST["event_subtitle"];
    $content = $_POST["event_content"];
    $imgcontent = $_POST["event_subcontent"];

	$upload_dir = './data/';

	$upfile_name	 = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type     = $_FILES["upfile"]["type"];
	$upfile_size     = $_FILES["upfile"]["size"];
	$upfile_error    = $_FILES["upfile"]["error"];

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;      
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size  > 100000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(100MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
	else 
	{
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
	}
	
    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");

	$sql = "insert into events (strdate, title, imgtitle, content, imgcontent, fix, file_name, file_type, file_copied) ";
	$sql .= "values('$strdate', '$title', '$imgtitle', '$content', '$imgcontent', 0, '$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	   	alert('등록되었습니다.');
	    location.href = 'admin_event.php';
	   </script>
	";
?>

  