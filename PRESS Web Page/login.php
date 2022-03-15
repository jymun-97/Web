<!DOCTYPE html>
<meta charset="utf-8">
<?php
    $email = $_POST["email"];
    $pass = $_POST["pass"];

   $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
   $sql = "select * from member where email='$email'";
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 이메일입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if($pass != $db_pass)
        {

           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["username"] = $row["name"];
            $_SESSION["useremail"] = $row["email"];
            $_SESSION["usermajor"] = $row["major"];
            $_SESSION["userposition"] = $row["position"];
            $_SESSION["studentID"] = $row["studentID"];

            echo("
              <script>
                location.href = 'index.php';
              </script>
            ");
        }
     }        
?>
