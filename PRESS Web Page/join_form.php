<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<link rel="stylesheet" type="text/css" href="./css/join.css">
<script>
   function check_input()
   {
      if (!document.join_form.name.value) {
          alert("이름을 입력하세요!");    
          document.join_form.name.focus();
          return;
      }

      if (!document.join_form.studentID.value) {
          alert("학번을 입력하세요!");    
          document.join_form.studentID.focus();
          return;
      }

      if (!document.join_form.email.value) {
          alert("이메일 주소를 입력하세요!");    
          document.join_form.email.focus();
          return;
      }

      if (!document.join_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.join_form.pass.focus();
          return;
      }

      if (!document.join_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.join_form.pass_confirm.focus();
          return;
      }

      var maj = document.getElementById("major")
      if (maj.options[maj.selectedIndex].text=="Major") {
          alert("전공을 선택하세요!");    
          document.join_form.major.focus();
          return;
      }

      var pos = document.getElementById("position")
      if (pos.options[pos.selectedIndex].text=="Position") {
          alert("직위를 선택하세요!");    
          document.join_form.position.focus();
          return;
      }

      if (document.join_form.pass.value != 
            document.join_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.join_form.pass.focus();
          document.join_form.pass.select();
          return;
      }

      document.join_form.submit();
   }
</script>
</head>

<body> 
	<div id="join_top">
		<a href="index.php">
			<img src="./img/img_close.png">
		</a>
	</div>

	<div id="join_box">
		<form name="join_form" method="post" action="join_insert.php">
			<h3>가입하기</h3>
			<ul>
				<li>이미 계정이 있습니까?</li>
				<li style="color: rgb(25, 64, 86);">
					<a href="login_form.php">
						로그인
					</a>
				</li>
			</ul>
			<p><input type="text" placeholder="Name" name= "name" style="width: 300px; height: 30px;"></p>
			<p><input type="text" placeholder="Student ID" name= "studentID" style="width: 300px; height: 30px;"></p>
			<p><input type="text" placeholder="email" name= "email" style="width: 300px; height: 30px;"></p>
			<p><input type="password" placeholder="password" name= "pass" style="width: 300px; height: 30px;"></p>
			<p><input type="password" placeholder="password confirm" name= "pass_confirm" style="width: 300px; height: 30px;"></p>
			<p>
				<select name= "major" id= "major" style="width: 305px; height: 30px;">
					<option selected>Major</option>
					<option >기계공학부</option>
					<option >건축공학부</option>
					<option >디자인공학부</option>
					<option >메카트로닉스공학부</option>
					<option >전기전자통신공학부</option>
					<option >컴퓨터공학부</option>
					<option >에너지신소재공학부</option>
					<option >산업경영학부</option>
				</select>
			</p>
			<p>
				<select name= "position" id= "position" style="width: 305px; height: 30px;">
					<option selected>Position</option>
					<option >수습기자</option>
					<option >정기자</option>
					<option >기획부장</option>
					<option >편집장</option>
					<option >명예기자</option>
					<option >재학생</option>
				</select>
			</p>

			<p><input type="button" style="width: 300px; height: 40px; color: white; cursor: pointer;background-color: rgb(25, 64, 86);" onclick="check_input()" value="가입하기"></p>
		</form>
	</div>
</body>
</html>
