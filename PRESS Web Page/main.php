<div style="position: fixed; bottom: 5px; right: 1px; z-index: 1">
  <a href="#"><img src="./img/btn_top.png" style="width: 60px; height: 100px; scroll-behavior: smooth;"></a>
</div>

<div id="main_top">
	<h1>KOREATECH PRESS</h1>
	<h3>대학 언론 문화를 이끌어 가는 신문사</h3>
</div>

<div id="main_slide" class="slide">
  <ul>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div> 

</div>
<div id="main_greeting">
	<h1>신문사 편집장 인사</h1>
	<h2>편집장 OOO</h2>
	<P>KOREATECH PRESS의 홈페이지에 오신 것을 환영합니다.</P>
	<p>PRESS는 언론 3사 중 신문사로 활동하고 있으며 정의로운 대학 언론 문화를 이끌고 있습니다.</p>
	<p>홈페이지를 둘러보고 궁금한 점이 있다면 연락해주세요</p>
</div>

<div id="main_event">
	<h1>Upcoming Events</h1>

<?php
    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from events where fix = 1";
    $result = mysqli_query($con, $sql);
    $n = mysqli_num_rows($result); // 전체 수

    for ($i = 0; $i < $n; $i++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $strdate = $row['strdate'];
        $title = $row['title'];
        $imgtitle = $row['imgtitle'];
        $imgcontent = $row['imgcontent'];
        $img = "./data/";
        $img .= $row['file_copied'];
?>
  <div id="event_box">
    <figure class="snip1384">
      <img src="<?=$img?>" alt="sample83" />
      <figcaption>
        <h3><?=$imgtitle?></h3>
        <p><?=$imgcontent?></p><i class="ion-ios-arrow-right"></i>
      </figcaption>
    </figure>

    <div id="event_inf">
      <h3><?=$title?></h3>
      <p><?=$strdate?></p>
      <button onclick="location.href='event_view.php?title=<?=$title?>'">자세히 보기</button>
    </div>
  </div>
<?php } ?>
</div>

</div>

<div id="main_question">
	<h1>홈페이지 문의</h1>
	<p>mjy0750@koreatech.ac.kr</p>
	<p>문 준 영</p>
	<p>010-0000-0000</p>
</div>

<style>
    *{margin:0;padding:0;}
    ul,li{list-style:none;}
    .slide{height:300px;overflow:hidden;}
    .slide ul{position:relative;height:100%;}
    .slide li{position:absolute;left:0;right:0;top:0;bottom:0;opacity:0;animation:fade 8s infinite;}
    .slide li:nth-child(1){background:#ffa;animation-delay:0s}
    .slide li:nth-child(2){background:#faa;animation-delay:2s}
    .slide li:nth-child(3){background:#afa;animation-delay:4s}
    .slide li:nth-child(4){background:#aaf;animation-delay:6s}

     /* 100 / 8 = 12.5 */
    @keyframes fade {
      0% {opacity:0;}
      5% {opacity:1;}
      25% {opacity:1;}
      30% {opacity:0;}
      100% {opacity:0;}
    }
</style>