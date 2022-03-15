<!DOCTYPE html>
<meta charset="utf-8">
<?php
    $title = $_POST["activity_title"];
    $content = $_POST["activity_content"];

	$upload_dir = './data/';

	$upimage_name	 = $_FILES["upimage"]["name"];
	$upimage_tmp_name = $_FILES["upimage"]["tmp_name"];
	$upimage_type     = $_FILES["upimage"]["type"];
	$upimage_size     = $_FILES["upimage"]["size"];
	$upimage_error    = $_FILES["upimage"]["error"];

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
		$upimage_name      = "";
		$upimage_type      = "";
		$copied_image_name = "";
	}
	if ($upimage_name && !$upimage_error)
	{
		$image = explode(".", $upimage_name);
		$image_name = $image[0];
		$image_ext  = $image[1];

		$new_image_name = date("Y_m_d_H_i_s");
		$new_image_name = $new_image_name;
		$copied_image_name = $new_image_name.".".$image_ext;      
		$uploaded_image = $upload_dir.$copied_image_name;

		if( $upimage_size  > 10000000 ) {
				echo("
				<script>
				alert('업로드 이미지 크기가 지정된 용량(10MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
		}

		if (!move_uploaded_file($upimage_tmp_name, $uploaded_image) )
		{
				echo("
					<script>
					alert('이미지를 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
	else 
	{
		$upimage_name      = "";
		$upimage_type      = "";
		$copied_image_name = "";
	}
	
    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");

	$sql = "insert into activity (title, content, fix, img_name, img_type, img_copied, file_name, file_type, file_copied) ";
	$sql .= "values('$title', '$content', 0, '$upimage_name', '$upimage_type', '$copied_image_name', '$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	   	alert('등록되었습니다.');
	    location.href = 'admin_activity.php';
	   </script>
	";
?>

  
