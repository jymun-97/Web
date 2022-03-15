<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="stylesheet" type="text/css" href="./css/normal.css">
<script></script>
</head>

<body>
    <header>
        <?php include "header.php";?>
    </header>

    <div id="board_box"> 
        <div id="board_box_title" class="title">
            <h2>Q&A 게시판에 오신 것을 환영합니다</h2>
            <p>질문을 작성하거나 다양한 주제에 대한 답변을 확인해보세요</p>
        </div>

        <ul id="board_list">
            <li>
                <span class="subject">
                    <select name="priority" id="priority" onchange="window.location=this.value">
                        <option value="board_form.php">최신순</option>
                        <option value="board_form2.php">오래된순</option>
                        <option value="board_form3.php">조회순</option>
                        <option value="board_form4.php" selected>인기순</option>
                    </select>
                </span>
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

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from board order by fix desc, likes desc";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result); // 전체 글 수

    $scale = 10;

    // 전체 페이지 수($total_page) 계산 
    if ($total_record % $scale == 0)     
        $total_page = floor($total_record/$scale);      
    else
        $total_page = floor($total_record/$scale) + 1; 
 
    // 표시할 페이지($page)에 따라 $start 계산  
    $start = ($page - 1) * $scale;      

    $number = $total_record - $start;

    for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
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
       $number--;
    }
    mysqli_close($con);
?>
        </ul>
        <ul id="page_num">  
<?php
    if ($total_page>=2 && $page >= 2)   
    {
        $new_page = $page-1;
        echo "<li><a href='board_form.php?page=$new_page'>◀ 이전</a> </li>";
    }       
    else 
        echo "<li>&nbsp;</li>";

    // 게시판 목록 하단에 페이지 링크 번호 출력
    for ($i=1; $i<=$total_page; $i++)
    {
        if ($page == $i)     // 현재 페이지 번호 링크 안함
        {
            echo "<li><b> $i </b></li>";
        }
        else
        {
            echo "<li><a href='board_form.php?page=$i'> $i </a><li>";
        }
    }
    if ($total_page>=2 && $page != $total_page)     
    {
        $new_page = $page+1;    
        echo "<li> <a href='board_form.php?page=$new_page'>다음 ▶</a> </li>";
    }
    else 
        echo "<li>&nbsp;</li>";
?>
        </ul> <!-- page -->         
        <ul class="buttons">
            <li>
<?php 
    if($username) {
?>
            <div id= "board_button_box">
                <button id= "board_button_insert" onclick="location.href='board_write.php'">글쓰기</button>
            </div>
<?php
    } else {
?>          <div id= "board_button_box">
                <a href="javascript:alert('로그인 후 이용해 주세요!')"><button id= "board_button_insert">글쓰기</button></a>
            </div>
<?php
    }
?>
            </li>
        </ul>
    </div>

    <footer>
        <?php include "footer.php";?>
    </footer> 
</body>

<style>
    .title {
        background-image: url(./img/img_typing.jpg);
    }
</style>