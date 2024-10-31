<?php
	session_start();
    session_destroy();
    $conn = mysqli_connect('127.0.0.1:3306', 'u110261070_Flagg', '246@Gkenya', 'u110261070_flagging');
    $conn->close();
    header("Location: https://flagging.goldencourtsafrica.com/");
    exit(); 
?>