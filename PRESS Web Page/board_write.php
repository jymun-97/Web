<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
<script>
	function check_input() {
      	if (!document.board_write.subject.value)
      	{
          	alert("제목을 입력하세요!");
          	document.board_write.subject.focus();
          	return;
      	}
      	if (!document.board_write.content.value)
      	{
          	alert("내용을 입력하세요!");    
          	document.board_write.content.focus();
          	return;
      	}
      	document.board_write.submit();
  	}
</script>
</head>

<body>
	<header>
    	<?php include "header.php";?>
    </header>

    <div id= "board_box">
    	<div id="board_write_title">
    		<p>게시판 ▶ 문의하기</p>
    	</div>

    	<form name="board_write" method="post" action="board_insert.php" enctype="multipart/form-date">
    		<div id= "board_write_box">
	    		<div id= "board_write_box_name">
	    			<p><img src="./img/img_user.png">&nbsp<?=$username?></p>
	    		</div>	

	    		<div id= "board_write_box_subject">
	    			<p><input type="text" name="subject" placeholder="문의사항"></p>
	    		</div>	

	    		<div id= "board_write_box_content">
	    			<p><textarea type="text" name="content" placeholder="내용을 입력하고 답변을 받아보세요."></textarea></p>
	    		</div>	

	    		<div id= "board_write_box_file" class="filebox">
	    			<label for="file">
	    				<img src="./img/img_addfile.png">
	    			</label>
	    			<input type="file" name="upfile" id="file">
	    		</div>
	    	</div>
	    
	    	<div id= "board_button">
	    		<ul id="board_button_box">
			    	<li><button type="button" id="board_button_insert" onclick="check_input()">확인</button></li>
			    	<li><button type="button" id="board_button_cancel" onclick="location.href='board_form.php'">취소</button></li>
				  </ul>
			 </div>
    	</form>
	</div>

    <footer>
        <?php include "footer.php";?>
    </footer> 
</body>

<style>
	.filebox label {
  		cursor: pointer;
	}

	.filebox input[type="file"] {
  		position: absolute;
  		width: 1px;
  		height: 1px;
  		padding: 0;
  		margin: -1px;
  		overflow: hidden;
  		clip: rect(0, 0, 0, 0);
  		border: 0;
	}
</style>