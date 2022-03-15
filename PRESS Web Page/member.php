<?php
    session_start();
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["usermajor"])) $usermajor = $_SESSION["usermajor"];
    else $usermajor = "";
    if (isset($_SESSION["userposition"])) $userposition = $_SESSION["userposition"];
    else $userposition = "";

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from board where name='$username'";
    $result = mysqli_query($con, $sql);
    $nWriting = mysqli_num_rows($result); // 전체 글 수
    $nLikes = 0;

    for ($i = 0; $i < $nWriting; $i++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $likes = $row['likes'];
        $nLikes += $likes;
    }
?>		

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/member.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>

<body>
	<header>
    	<?php include "header.php";?>
    </header>

<?php	if (!$username) { ?>
        <div id="not_login">
            <h3>회원 활동 및 로그인 안내</h3>
            <p>다른 회원 확인 및 게시물 작성 등의 활동을</p>
            <p>시작하려면 로그인하세요.</p>
            <button onclick="location.href='login_form.php'">로그인</button>
        </div>
<?php  }

    else { ?>
        <ul id= "member_box">
            <div id="box_left">
                <div id="profil">
                    <div id="profil_icon"><h3><?=$username?></h3></div>
                    <p><?=$usermajor?></p>
                    <p style="font-size: 12px; padding-top: 8px; color: gray;">
                        <img src="./img/img_crown.png">
                        <?=$userposition?>
                    </p>

                    <ul id="board_inf">
                        <li id="nWriting">
                            <p><?=$nWriting?></p>
                            <p>게시물</p>
                        </li>
                        <li id="nLikes">
                            <p><?=$nLikes?></p>
                            <p>좋아요</p>
                        </li>
                    </ul>

                    <button  onclick="location.href='modify_form.php'"> 정보수정하기</button>
                </div>
            </div>
            <div id="box_right">
                <div id="inf">
                    <h2>내가 작성한 게시물</h2>
                </div>
                <ul id="board_list_me">
                    <li>
                        <span class="subject"></span>
                        <span class="ncomment"><img src="./img/img_comment.png"></span>
                        <span class="likes"><img src="./img/img_likes.png"></span>
                        <span class="hit"><img src="./img/img_hit.png"></span>
                        <span class="name"><img src="./img/img_writer.png"></span>
                    </li>
<?php
    if (isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;

    $sql = "select * from board where name='$username' order by fix desc, regist_day desc";
    for ($i=0; $i<$nWriting; $i++)
    {
        mysqli_data_seek($result, $i);
        // 가져올 레코드로 위치(포인터) 이동
        $row = mysqli_fetch_array($result);
        // 하나의 레코드 가져오기
        $num         = $row["num"];
        $subject     = $row["subject"];
        $ncomment    = $row["ncomment"];
        $likes       = $row['likes'];
        $hit         = $row["hit"];
        $name        = $row["name"];
        $fix        = $row["fix"];    
?>
                    <li>
<?php
    if ($fix == 1) { ?>
                        <span class="subject"><img src="./img/img_notice.png" style="width: 15px; height: 15px; vertical-align: center;"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>">&nbsp<?=$subject?></a></span>
<?php } else { ?>
                        <span class="subject"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
<?php } ?>
                        <span class="ncomment"><?=$ncomment?></span>
                        <span class="likes"><?=$likes?></span>
                        <span class="hit"><?=$hit?></span>
                        <span class="name"><?=$name?></span>
                    </li>
<?php
    } 
    mysqli_close($con);
?>
                </ul>
                <div id="inf">
                    <h2 style="margin-top: 50px;">내가 남긴 댓글</h2>
                </div>
                <div id= "comment_list_me">
<?php
    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from comment where username='$username' order by likes desc, regist_day";
    $result = mysqli_query($con, $sql);
    $nWriting = mysqli_num_rows($result); // 전체 글 수

    for ($i = 0; $i < $nWriting; $i++) {
        $row = mysqli_fetch_array($result);
        $writer      = $row["username"];
        $regist_day = $row["regist_day"];
        $content    = $row["content"];
        $subject    = $row["subject"];
        $file_name    = $row["file_name"];
        $file_type    = $row["file_type"];
        $file_copied  = $row["file_copied"];
        $likes       = $row['likes'];
        $number       = $row['number'];
        $fix       = $row['fix'];
?>
                <div id="comment_list_box_me">
                    <div id= "comment_list_name_me">
                        <li><a href="board_view.php?num=<?=$number?>&page=<?=$page?>"><img src="./img/img_title.png">&nbsp"<?=$subject?>"</a></li>  
                        <li style="float:right;"><img style="width: 20px; height: 20px" src="./img/thumb.jpg"><?=$likes?></li>
                    </div>
                    <div id= "comment_list_content_me">
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
<?php } ?>
</div>
            </div>
        </ul>
<?php  } ?>

    <footer>
        <?php include "footer.php";?>
    </footer> 
</body>