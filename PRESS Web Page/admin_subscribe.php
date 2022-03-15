<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
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
                    <li><a href="admin_board.php">게시판 관리</a></li>
                    <li><a href="admin_event.php">이벤트 관리</a></li>
                    <li><a href="admin_activity.php">활동자료 관리</a></li>
                    <li style="font-weight: bold; "><a href="admin_subscribe.php">구독자 관리</a></li>
                </div>
            </div>

            <div id="box_right">
                <div id="inf">
                    <h2>구독자 관리</h2>
                </div>
                <ul id="row_member">
                    <li>
                        <span class="col_email"><img src="./img/email.png"></span>
                        <span class="col_regist_day"><img src="./img/day.jpg"></span>
                    </li>
                </ul>

<?php
    $sql = "select * from subscribe order by regist_day desc";
    $result = mysqli_query($con, $sql);
    $n = mysqli_num_rows($result); 
    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_array($result);
        $email    = $row["email"];
        $regist_day    = $row["regist_day"];
        $checked    = $row["checked"];
?>

<?php
    if ($checked != 1) { ?>
                <ul id="row_member">
                    <li>
                        <span class="col_email"><?=$email?></span>
                        <span class="col_regist_day"><?=$regist_day?></span>
                        <span class="col_isnew"><img src="./img/img_new.png" style="width: 40px;"></span>
                        <span class="col_check"><button onclick="location.href='subscribe_check.php?email=<?=$email?>'">확인</button></span>
                    </li>
                </ul>
<?php } else { ?>
                <ul id="row_member">
                    <li>
                        <span class="col_email"><?=$email?></span>
                        <span class="col_new"><?=$isnew?></span>
                        <span class="col_regist_day"><?=$regist_day?></span>
                    </li>
                </ul>
<?php }} ?>
            </div>
        </ul>
    </section>
</body>

	<footer>
        <?php include "footer.php";?>
    </footer> 
</body>