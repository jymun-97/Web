<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/login.css">
<script>
	function check_login() 
	{
	    if (!document.login_form.email.value) {
    	    alert("이메일을 입력하세요");    
	        document.login_form.email.focus();
        	return;
    	}

	    if (!document.login_form.pass.value) {
   		     alert("비밀번호를 입력하세요");    
		    document.login_form.pass.focus();
        	return;
    	}
    
    	document.login_form.submit();
	}
</script>
</head>

<body> 
	<div id="login_top">
		<a href="index.php">
			<img src="./img/img_close.png">
		</a>
	</div>

	<div id="login_box">
		<form name= "login_form" method="post" action="login.php">
			<h3>로그인</h3>
			<ul>
				<li>아직 계정이 없습니까?</li>
				<li style="color: rgb(25, 64, 86);">
					<a href="join_form.php">
						회원가입
					</a>
				</li>
			</ul>

			<p><input type="text" name="email" placeholder="email" style="width: 300px; height: 30px;"></p>
			<p><input type="password" name="pass" placeholder="password" style="width: 300px; height: 30px;"></p>
			<p><button type="button" style="width: 300px; height: 40px; color: white; background-color: rgb(25, 64, 86); cursor: pointer" onclick="check_login()">로그인</button>
		</form>
	</div>
</body>
</html>
