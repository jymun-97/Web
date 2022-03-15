<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
<script>
	function checkinput() {
      	if (!document.event_add.event_title.value)
      	{
          	alert("제목을 입력하세요!");
          	document.event_add.event_title.focus();
          	return;
      	}
      	if (!document.event_add.event_subtitle.value)
      	{
          	alert("부제목을 입력하세요!");
          	document.event_add.event_subtitle.focus();
          	return;
      	}
      	if (!document.event_add.event_content.value)
      	{
          	alert("내용을 입력하세요!");    
          	document.event_add.event_content.focus();
          	return;
      	}
      	if (!document.event_add.event_subcontent.value)
      	{
          	alert("내용을 입력하세요!");    
          	document.event_add.event_subcontent.focus();
          	return;
      	}
      	document.event_add.submit();
  	}
</script>
</head>
  
<body>
  <header>
      <?php include "header.php";?>
  </header>

  <form name="event_add" method="post" action="event_add.php" enctype="multipart/form-data">
  	<div id= "event_add_box">
  		<div id= "event_day">
		  	<input type="date" name= "event_date" placeholder="Year/Month/Day">
  		</div>

  		<div id= "event_title">
  			<input type="text" name="event_title" placeholder="이벤트 제목입니다.">
  		</div>

  		<div id= "event_title">
  			<input type="text" name="event_subtitle" placeholder="이미지에 표시될 이벤트 제목입니다.">
  		</div>

  		<div id= "event_content">
  			<textarea type="text" name="event_content" placeholder="이벤트 내용입니다."></textarea>
  		</div>

  		<div id= "event_content">
  			<textarea type="text" name="event_subcontent" placeholder="이미지에 표시될 이벤트 내용입니다."></textarea>
  		</div>

  		<div id= "event_img">
  			<input type="file" name="upfile" cursor="pointer">
  		</div>
  	</div>
  	<div id= "event_button">
	    <ul id="event_button_box">
			<li><button type="button" id="event_button_insert" onclick="checkinput()">확인</button></li>
			<li><button type="button" id="event_button_cancel" onclick="location.href='admin_event.php'">취소</button></li>
		</ul>
	</div>


  	</form>
  		

















  <footer>
        <?php include "footer.php";?>
  </footer> 
</body>