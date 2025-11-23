<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
    <link rel="stylesheet" href="JerkoiStyle_1.css">
</head>
<body>
    <h1>Admin Product</h1>
    <br><br>
    <div class="cruzcon">
        <?php
        session_start();
        include "JerkoiConnection.php";
        
        $Jerkoiprodid = $_GET['Jerkoiprodid'];

        $sql = "SELECT * FROM Jerkoiproducts WHERE Jerkoiprodid = '$Jerkoiprodid'";
        $ressql = mysqli_query($JerkoiConn, $sql);

        if(mysqli_num_rows($ressql) === 1){
            $Jerkoiprod = mysqli_fetch_assoc($ressql);
            echo '
                <div class="Jerkoicard">
                    <img src="data:image/jpeg;base64,' . base64_encode($Jerkoiprod['Jerkoi_Image']) . '" width="200">
                    <div>
                        <table>
                            <tr>
                                <td><p>Product Name:</p></td>
                                <td><input type="text" name="Jerkoiprodname" value="'. $Jerkoiprod['Jerkoi_ProductName'] .'" disabled></td>
                            </tr>
                            <tr>
                                <td><p>Unit:</p></td>
                                <td><input type="text" name="Jerkoiunit" value="'. $Jerkoiprod['Jerkoi_Unit'] .'" disabled></td>
                            </tr>
                            <tr>
                                <td><p>Price per Unit:</p></td>
                                <td><input type="text" name="Jerkoipriceunit" value="'. $Jerkoiprod['Jerkoi_PriceperUnit'] .'" disabled></td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="Jerkoiviewbtn" onclick="window.location.href=\'JerkoiEditProduct.php?Jerkoiprodid='. $Jerkoiprod['Jerkoiprodid'] .'\'">Edit</button>
                                </td>
                                <td>
                                    <button class="Jerkoiviewbtn" onclick="window.location.href=\'JerkoiDeleteProduct.php?Jerkoiprodid='. $Jerkoiprod['Jerkoiprodid'] .'\'">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="Jerkoiviewbtn" onclick="window.location.href=\'JerkoiAdminProduct.php\'">Cancel</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            ';
        }
        ?>
    </div>
</body>
</html>
