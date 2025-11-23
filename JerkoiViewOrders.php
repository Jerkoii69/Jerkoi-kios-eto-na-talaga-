<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="JerkoiStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>View Orders</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Buyer Name</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Account</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "JerkoiConnection.php";

                $Jerkoisql = "SELECT * FROM Jerkoiorders";
                $Jerkoires = mysqli_query($JerkoiConn, $Jerkoisql);

                if(mysqli_num_rows($Jerkoires) > 0){
                    while($Jerkoiorders = mysqli_fetch_assoc($Jerkoires)){
                        echo "<tr>
                        <td><p>{$Jerkoiorders['order_id']}</p></td>
                        <td><p>{$Jerkoiorders['Jerkoi_BuyerName']}</p></td>
                        <td><p>{$Jerkoiorders['Jerkoi_ProductName']}</p></td>
                        <td><p>{$Jerkoiorders['Jerkoi_ProductPrice']}</p></td>
                        <td><p>{$Jerkoiorders['Jerkoi_Quantity']}</p></td>
                        <td><p>{$Jerkoiorders['Jerkoi_TotalPrice']}</p></td>
                        <td><p>{$Jerkoiorders['Jerkoi_Account']}</p></td>
                        </tr>";
                    }
                }
                else{
                    echo "
                        <tr>
                            <td colspan='7'>No orders found.</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
