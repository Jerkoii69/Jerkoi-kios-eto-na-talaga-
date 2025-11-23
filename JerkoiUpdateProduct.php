<?php
    session_start();

    include "JerkoiConnection.php";

    if(isset($_POST['Jerkoiupdatebtn'])){
        $Jerkoiprodid = $_GET['Jerkoiprodid'];
        $Jerkoiprodname = $_POST['Jerkoiprodname'];
        $Jerkoiunit = $_POST['Jerkoiunit'];
        $Jerkoipriceunit = $_POST['Jerkoipriceunit'];

        $query = "UPDATE Jerkoiproducts 
                  SET Jerkoi_ProductName='$Jerkoiprodname', Jerkoi_Unit='$Jerkoiunit', Jerkoi_PriceperUnit='$Jerkoipriceunit' 
                  WHERE Jerkoiprodid='$Jerkoiprodid'";

        if(mysqli_query($JerkoiConn, $query)){
            header("location: JerkoiViewProduct.php?Jerkoiprodid={$Jerkoiprodid}");
        }
    }
?>
