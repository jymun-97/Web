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
  function removeCheck() {
    if (confirm("정말 삭제하시겠습니까??") == true){    //확인
        document.removefrm.submit();
    } else {    //취소
        return false;
    }
  }
</script>
</head>

<body>
	<header>
    	<?php include "header.php";?>
    </header>

    <div id= "board_box">
    	<div id="board_write_title">
    		<p>게시판 ▶ 수정하기</p>
    	</div>
<?php
  $num  = $_GET["num"];
  $page = $_GET["page"];
  
  $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
  $sql = "select * from board where num=$num";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $name       = $row["name"];
  $subject    = $row["subject"];
  $content    = $row["content"];    
  $file_name  = $row["file_name"];
?>
    	<form name="board_write" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-date">
    		<div id= "board_write_box">
	    		<div id= "board_write_box_name">
	    			<li><img src="./img/img_user.png">&nbsp<?=$name?></li>
            <form action="board_delete.php?num=<?=$num?>&page=<?=$page?>" name="removefrm" method="post">
              <li style="float:right; padding-right: 50px;"><img onclick="removeCheck()" src="./img/img_delete.png" style="cursor: pointer;"></li>
            </form>
	    		</div>	

	    		<div id= "board_write_box_subject">
	    			<p><input type="text" name="subject" value="<?=$subject?>"></p>
	    		</div>	

	    		<div id= "board_write_box_content">
	    			<p><textarea type="text" name="content"><?=$content?></textarea></p>
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
			    	<li><button type="button" id="board_button_insert" onclick="check_input()">수정하기</button></li>
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