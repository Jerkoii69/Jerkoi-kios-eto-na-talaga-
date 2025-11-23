<?php
$JerkoiConn = mysqli_connect("localhost", "root", "", "Jerkoidb");
if (!$JerkoiConn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
