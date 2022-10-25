<?php
    $conn = mysqli_connect("localhost","root","","qt");
    $sel = mysqli_select_db($conn,'qt') or die('Could not select database.');
    mysqli_set_charset($conn,"utf8");
?>