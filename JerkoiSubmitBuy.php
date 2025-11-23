<?php
    session_start();
    include "JerkoiConnection.php";

    if(isset($_POST['Jerkoibuybtn'])){
        $Jerkoiusername = $_SESSION['Jerkoiusername'];

        $Jerkoibuyername = $_POST['Jerkoibuyername'];
        $Jerkoiquantity = $_POST['Jerkoiquantity'];
        $Jerkoiprodid = $_GET['id'];

        $sql = "SELECT * FROM Jerkoiproducts WHERE Jerkoiprodid ='$Jerkoiprodid'";
        $Jerkoibuyq = mysqli_query($JerkoiConn, $sql);

        if(mysqli_num_rows($Jerkoibuyq) === 1){
            $Jerkoiprod = mysqli_fetch_assoc($Jerkoibuyq);

            $Jerkoiproductname = $Jerkoiprod['Jerkoi_ProductName'];
            $Jerkoipriceperunit = $Jerkoiprod['Jerkoi_PriceperUnit'];

            $Jerkoitotalprice = $Jerkoipriceperunit * $Jerkoiquantity;

            $Jerkoiinsertbuy = "INSERT INTO Jerkoiorders (Jerkoi_BuyerName, Jerkoi_ProductName, Jerkoi_ProductPrice, Jerkoi_Quantity, Jerkoi_TotalPrice, Jerkoi_Account) 
                                  VALUES ('$Jerkoibuyername','$Jerkoiproductname','$Jerkoipriceperunit','$Jerkoiquantity','$Jerkoitotalprice','$Jerkoiusername')";

            if(mysqli_query($JerkoiConn, $Jerkoiinsertbuy)){
                header("location: JerkoiClientProduct.php");
            } else {
                header("location: JerkoiClientProduct.php");
            }
        }
    }
?>
