<?php
    session_start();
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["usermajor"])) $usermajor = $_SESSION["usermajor"];
    else $usermajor = "";
    if (isset($_SESSION["userposition"])) $userposition = $_SESSION["userposition"];
    else $userposition = "";
?>		

<div id="top">
	<h3>
		<a href="index.php">KOREATECH PRESS
		</a>
	</h3>

<?php
	if ($username) {
		$logged = "<".$userposition."> ".$username."님[".$usermajor."]";	
?>
		<ul>
			<li> <?=$logged?> </li>
	<?php
		if ($userposition=="편집장" || $userposition=="기획부장" || $username=="문준영") {
	?>
			<li> | </li>
			<li><a href="admin.php">관리자 모드</a></li>
	<?php
		}
    ?>  </ul>
<?php	
	}
?>
</div>

<div id="menu_bar">
	<ul>
		<li><a href="index.php">메인</a></li>
		<li><a href="activity.php">활동</a></li>
		<li><a href="board_form.php">게시판</a></li>
		<li><a href="member.php">회원</li>

<?php
	if (!$username) { ?>
		<li style="float: right;" >
			<a href="login_form.php">
				<img src="./img/img_user.png">Log In
			</a>
		</li>
<?php
	}

	else {
?>
		<li style="float: right;" >
			<a href="logout.php">
				<img src="./img/img_user.png">Log out
			</a>
		</li>		
<?php
	}
?>

	</ul>
</div>
