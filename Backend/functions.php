<?php
function checkLogin($con)
{
    if (isset($_SESSION["user_id"])) {
        $id = $_SESSION["user_id"];
        $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("location: login.php");
    die();
}

function randomNumber($length)
{
    $text = "";
    for ($i = 0; $i < $length; $i++) {
        $text .= strval(rand(0, 9));
    }
    return $text;
}
?>