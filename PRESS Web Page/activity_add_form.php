<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
<script>
	function checkinput() {
      	if (!document.activity_add.activity_title.value)
      	{
          	alert("제목을 입력하세요!");
          	document.activity_add.activity_title.focus();
          	return;
      	}
      	if (!document.activity_add.activity_content.value)
      	{
          	alert("내용을 입력하세요!");    
          	document.activity_add.activity_content.focus();
          	return;
      	}
      	document.activity_add.submit();
  	}
</script>
</head>
  
<body>
  <header>
      <?php include "header.php";?>
  </header>

  <form name="activity_add" method="post" action="activity_add.php" enctype="multipart/form-data">
  	<div id= "event_add_box">
  		<div id= "event_title">
  			<input type="text" name="activity_title" placeholder="활동 제목입니다.">
  		</div>

  		<div id= "event_content">
  			<textarea type="text" name="activity_content" placeholder="활동 내용입니다."></textarea>
  		</div>

      <div id= "activity_img">
        <p>Insert Image  </p>
        <input type="file" name="upimage" cursor="pointer">
      </div>

      <div id= "activity_img">
        <p>Insert File &nbsp&nbsp&nbsp </p>
        <input type="file" name="upfile" cursor="pointer">
      </div>
  	</div>
  	<div id= "event_button">
	    <ul id="event_button_box">
			<li><button type="button" id="event_button_insert" onclick="checkinput()">확인</button></li>
			<li><button type="button" id="event_button_cancel" onclick="location.href='admin_activity.php'">취소</button></li>
		</ul>
	</div>


  	</form>
  		

















  <footer>
        <?php include "footer.php";?>
  </footer> 
</body>