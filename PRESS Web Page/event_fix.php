<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
</html>

<?php
    $title = $_GET["title"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from events where fix = 1";
    $result = mysqli_query($con, $sql);
    $nFix = mysqli_num_rows($result);

    if ($nFix >= 3) {
        echo "
            <script>
                alert('고정할 이벤트는 최대 3개입니다.');
                location.href = 'admin_event.php';
            </script>
        ";
    }

    else {
        $sql = "update events set fix = 1 where title='$title'";
        mysqli_query($con, $sql);
        mysqli_close($con);

        echo "
            <script>
                location.href = 'admin_event.php';
            </script>
        ";
    }
?>

