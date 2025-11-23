<?php
    session_start();

    include "JerkoiConnection.php";

    $Jerkoiid = $_GET['Jerkoiid'];

    $updatesql = "UPDATE Jerkoiregistration SET Jerkoi_Status = '1' WHERE id = '$Jerkoiid'";

    $res = mysqli_query($JerkoiConn, $updatesql);

    if($res){
        echo "<script>alert('Approved');</script>";

        sleep(3);

        header("location: JerkoiViewClients.php");
    }
    else{
        echo "<script>alert('Something went wrong, please try again.');</script>";

        sleep(3);

        header("location: JerkoiViewClients.php");
    }
?>
