<?php
    include "JerkoiConnection.php";
    session_start();

    $Jerkoiprodid = $_GET['Jerkoiprodid'];

    $sql = "DELETE FROM Jerkoiproducts WHERE Jerkoiprodid = '$Jerkoiprodid'";

    if(mysqli_query($JerkoiConn, $sql)){
        header("location: JerkoiAdminProduct.php");
    }
?>
