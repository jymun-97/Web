<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
</html>

<?php
    $title = $_GET["title"];

    $con = mysqli_connect("localhost", "mjy0750", "junyoung10", "project");
    $sql = "select * from activity where fix = 1";
    $result = mysqli_query($con, $sql);
    $nFix = mysqli_num_rows($result);

    if ($nFix >= 4) {
        echo "
            <script>
                alert('고정할 자료는 최대 4개입니다.');
                location.href = 'admin_activity.php';
            </script>
        ";
    }

    else {
        $sql = "update activity set fix = 1 where title='$title'";
        mysqli_query($con, $sql);
        mysqli_close($con);

        echo "
            <script>
                location.href = 'admin_activity.php';
            </script>
        ";
    }
?>

