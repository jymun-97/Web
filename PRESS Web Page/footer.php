<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>KOREATECH PRESS</title>
<script>
   function check_email()
   {
      if (!document.subscribe.email.value) {
          alert("이메일 주소를 입력하세요!");    
          document.subscribe.email.focus();
          return;
      }

      document.subscribe.submit();
   }
</script>
</head>

<div id="bottom">
	<form name= "subscribe" method="post" action="subscribe.php">
		<p>구독양식</p>
		<h2><input type="text" name=email placeholder="이메일 주소를 입력하세요." style="width: 300px; height: 30px;"></h2>
		<h3><input type="button" value="제출하기" onclick="check_email()" style="width: 300px; height: 30px; background-color: black; color: white; cursor: pointer;"></h3>
		<span>©PHP Programming. Created by Moon Junyoung. 2016136040</span>
	</form>
</div>