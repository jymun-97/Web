<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>

<?php
    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from member";
    $result = mysqli_query($con, $sql);
    $nMember = mysqli_num_rows($result); 

    $sql = "select * from subscribe";
    $result = mysqli_query($con, $sql);
    $nSubscribe = mysqli_num_rows($result); 
?>	
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <section>
    	<ul id= "admin_box">
            <div id="box_left">
                <div id="profil">
                    <div id="profil_icon">
                        <h3><?=$username?></h3>
                    </div>
                    <p><?=$usermajor?></p>
                    <p style="font-size: 12px; padding-top: 8px; color: gray;">
                        <img src="./img/img_crown.png">
                        <?=$userposition?>
                    </p>

                    <ul id="member_inf">
                        <li id="nMember">
                            <p><?=$nMember?></p>
                            <p>회원수</p>
                        </li>
<?php
    $isNew = 0;
    for ($i = 0; $i < $nSubscribe; $i++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $checked = $row['checked'];
        
        if ($checked != 1)
            $isNew = 1;
    }

    if ($isNew == 1) {
?>
                        <li id="nSubscribe">
                            <a href="admin_subscribe.php">
                                <p><img src="./img/img_new.png">&nbsp<?=$nSubscribe?></p>
                            </a>
                            <p>구독자</p>
                        </li>
<?php } else { ?>
                        <li id="nSubscribe">
                            <p><?=$nSubscribe?></p>
                            <p>구독자</p>
                        </li>
<?php } ?>
                    </ul>
                </div>

                <div id= "menu">
                    <li><a href="admin.php">회원 관리</a></li>
                    <li style="font-weight: bold"><a href="admin_board.php">게시판 관리</a></li>
                    <li><a href="admin_event.php">이벤트 관리</a></li>
                    <li><a href="admin_activity.php">활동자료 관리</a></li>
                    <li><a href="admin_subscribe.php">구독자 관리</a></li>
                </div>
            </div>

            <div id="box_right">
                <div id="inf">
                    <h2>게시판 관리</h2>
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

    $sql = "select * from board order by fix desc, regist_day desc";
    $result = mysqli_query($con, $sql);
    $nWriting = mysqli_num_rows($result); // 전체 글 수

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
        $fix         = $row["fix"];    
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
                        <span class="col_delete"><img src="./img/img_delete.png" onclick="location.href='admin_board_delete.php?num=<?=$num?>'" style="cursor: pointer;"></span>
                    </li>
<?php
    } 
    mysqli_close($con);
?>
</ul>
            </div>
        </ul>
    </section>
</body>

	<footer>
        <?php include "footer.php";?>
    </footer> 
</body>