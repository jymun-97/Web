<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/normal.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script type="text/javascript">
	function removeCheck() {
	 	if (confirm("정말 삭제하시겠습니까??") == true){    //확인
     		document.removefrm.submit();
 		} else {    //취소
	    	return false;
 		}
	}
	function entercomment() {
      	if (!document.comment_write.content.value)
      	{
          	alert("내용을 입력하세요!");    
          	document.comment_write.content.focus();
          	return;
      	}
      	document.comment_write.submit();
	}
</script>
</head>
<body> 
	<header>
	    <?php include "header.php";?>
	</header>  
			
	<div id= "board_box">
    	<div id="board_write_title">
    		<p>게시판 ▶ 내용보기</p>
    	</div>

<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];

	$con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$email      = $row["email"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_copied  = $row["file_copied"];
	$hit          = $row["hit"];
    $ncomment    = $row["ncomment"];
    $likes       = $row['likes'];
    $fix       = $row['fix'];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	$new_hit = $hit + 1;
	$sql = "update board set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
	mysqli_close($con);
?>
		<div id="board_view_box">
		<?php
			if ($username == $name) {
		?>
			<div id= "board_write_box_name">
				<form action="board_delete.php?num=<?=$num?>&page=<?=$page?>" name="removefrm" method="post">
					<li><img src="./img/img_user.png">&nbsp<?=$name?> &nbsp|&nbsp<?=$regist_day?></li>

					<li style="float:right; padding-right: 50px;"><img onclick="removeCheck()" src="./img/img_delete.png" style="cursor: pointer;"></li>
					<li style="float:right"><a href="board_modify_form.php?num=<?=$num?>&page=<?=$page?>"><img src="./img/img_modify.png"></a></li>
				</form>
	    	</div>		
		<?php
			}
			else {
		?>
			<div id= "board_write_box_name">
				<li><img src="./img/img_user.png">&nbsp<?=$name?> &nbsp|&nbsp<?=$regist_day?></li>
	    	</div>
	    <?php
	    	}
	    	if ($fix == 1) { ?>
			<div id= "board_write_box_subject">
	    		<p><img src="./img/img_notice.png" style="width: 40px; height: 40px; vertical-align: center;">&nbsp<?=$subject?></p>
	    	</div>
	    <?php } 
	    	else { ?>
	    	<div id= "board_write_box_subject">
	    		<p><?=$subject?></p>
	    	</div>
	    <?php } ?>
	    	<div id= "board_view_box_content">
	    		<p><?=$content?></p>
	    	</div>

	    	<ul id= "board_view_box_inf">
	    <?php
	    	if ($userposition=="편집장" || $userposition=="기획부장" || $username=="문준영") { ?>
	    		<li><img src="./img/img_comment.png"><?=$ncomment?></li>
	    		<li><a href="push_likes.php?num=<?=$num?>&page=<?=$page?>"><img src="./img/likesred.png"><?=$likes?></a></li>
	    		<li><img src="./img/img_hit.png"><?=$hit?></li>
	    		<li><a href="push_notice.php?num=<?=$num?>&page=<?=$page?>"><img src="./img/img_notice2.png">게시물 고정하기</a></li>
	    		<button type="button" onclick="content.focus()">답변하기</button>
	    <?php } 
	    	else { ?>
	    		<li><img src="./img/img_comment.png">답변</li>
	    		<li><a href="push_likes.php?num=<?=$num?>&page=<?=$page?>"><img src="./img/likesred.png" style="width: 12px; height: 12px;"><?=$likes?></a></li>
	    <?php } ?>
	    	</ul>

			<div>
				<?php
					if($file_name) {
						$real_name = $file_copied;
						$file_path = "./data/".$real_name;
						$file_size = filesize($file_path);

						echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
			           	}
				?>
			</div>		
	    </div>

	    <div id= "comment_list">
<?php
	$con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from comment where number=$num order by likes desc, regist_day";
    $result = mysqli_query($con, $sql);

    for ($i = 0; $i < $ncomment; $i++) {
    	$row = mysqli_fetch_array($result);
    	$writer      = $row["username"];
		$regist_day = $row["regist_day"];
		$content    = $row["content"];
		$file_name    = $row["file_name"];
		$file_type    = $row["file_type"];
		$file_copied  = $row["file_copied"];
	    $likes       = $row['likes'];
	    $number       = $row['num'];

	    if ($i == 0 && $likes > 0) {
?>
			<div id="comment_list_box" style="background-color: rgb(243, 245, 246);">
			<?php
				if ($username == $writer) {
			?>
				<div id= "comment_list_name">
						<li><img src="./img/img_writer.png">&nbsp<?=$writer?> &nbsp|&nbsp<?=$regist_day?></li>	

						<li style="float:right; padding-right: 50px; ">
							<a href="comment_delete.php?num=<?=$num?>&page=<?=$page?>&number=<?=$number?>&ncomment=<?=$ncomment?>">
								<img onclick="removeCheck_comment()" src="./img/img_delete.png" style="cursor: pointer;">
							</a>
						</li>
	    				<li style="float:right; padding-left: 20px"><a href="push_likes_comment.php?num=<?=$num?>&page=<?=$page?>&number=<?=$number?>"><img style="width: 20px; height: 20px; " src="./img/thumb.jpg"><?=$likes?></a></li>
						<li style="float:right; color: rgb(25, 64, 86);"><img src="./img/best.png" style="width: 20px; height: 20px; ">베스트 답변</li>
		    	</div>		
			<?php
				}
				else {
			?>
				<div id= "comment_list_name">
					<li><img src="./img/img_user.png">&nbsp<?=$writer?> &nbsp|&nbsp<?=$regist_day?></li>
					<li style="float:right; margin-right: 110px;"><a href="push_likes_comment.php?num=<?=$num?>&page=<?=$page?>&number=<?=$number?>"><img style="width: 20px; height: 20px" src="./img/thumb.jpg"><?=$likes?></a></li>
		    	</div>
		    <?php
		    	}
		    ?>
		    	<div id= "comment_list_content">
		    		<p><?=$content?></p>
		    	</div>	

				<div>
					<?php
						if($file_name) {
							$real_name = $file_copied;
							$file_path = "./data/".$real_name;
							$file_size = filesize($file_path);	

							echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
				       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
				           	}
					?>
				</div>
			</div>
<?php  } else {
?>			<div id="comment_list_box">
			<?php
				if ($username == $writer) {
			?>
				<div id= "comment_list_name">
						<li><img src="./img/img_writer.png">&nbsp<?=$writer?> &nbsp|&nbsp<?=$regist_day?></li>	

						<li style="float:right; padding-right: 50px; ">
							<a href="comment_delete.php?num=<?=$num?>&page=<?=$page?>&number=<?=$number?>&ncomment=<?=$ncomment?>">
								<img onclick="removeCheck_comment()" src="./img/img_delete.png" style="cursor: pointer;">
							</a>
						</li>
	    				<li style="float:right;"><a href="push_likes_comment.php?num=<?=$num?>&page=<?=$page?>&number=<?=$number?>"><img style="width: 20px; height: 20px" src="./img/thumb.jpg"><?=$likes?></a></li>
		    	</div>		
			<?php
				}
				else {
			?>
				<div id= "comment_list_name">
					<li><img src="./img/img_user.png">&nbsp<?=$writer?> &nbsp|&nbsp<?=$regist_day?></li>
					<li style="float:right; margin-right: 110px;"><a href="push_likes_comment.php?num=<?=$num?>&page=<?=$page?>&number=<?=$number?>"><img style="width: 20px; height: 20px" src="./img/thumb.jpg"><?=$likes?></a></li>
		    	</div>
		    <?php
		    	}
		    ?>
		    	<div id= "comment_list_content">
		    		<p><?=$content?></p>
		    	</div>	

				<div>
					<?php
						if($file_name) {
							$real_name = $file_copied;
							$file_path = "./data/".$real_name;
							$file_size = filesize($file_path);	

							echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
				       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
				           	}
					?>
				</div>
			</div>
<?php }} ?>
		</div>

	    <div id="comment_box">
	    	<div id="comment_write">
	    		<form action="comment_insert.php?subject=<?=$subject?>&name=<?=$name?>&num=<?=$num?>&page=<?=$page?>" name="comment_write" method="post">
	    			<ul>
	    				<li><input type="text" name="content" id="content" placeholder=" 답변을 알고있다면 댓글을 입력하세요."></li>
		    			<img src="./img/img_commenting.png" onclick="entercomment()" style="cursor: pointer;">
		    		</ul>
		    	</form>
	    	</div>
	    	<div id= "comment_write_file" class="filebox">
	    		<label for="file">
	    			<img src="./img/img_addfile.png">
	    		</label>
	    		<input type="file" name="upfile" id="file">
	    	</div>
	    </div>

	    <div id= "board_button">
	    	<ul id="board_button_box">
				<li><button type="button" id="board_button_insert" onclick="location.href='board_form.php?page=<?=$page?>'">목록</button></li>
				<li><button type="button" id="board_button_cancel" onclick="location.href='board_write.php'">글쓰기</button></li>
			</ul>
		</div>
    </div>

	<footer>
	    <?php include "footer.php";?>
	</footer>
</body>
</html>

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