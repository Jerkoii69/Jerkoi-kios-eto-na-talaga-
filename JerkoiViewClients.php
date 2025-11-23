<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="Jerkoimid.css">
    <title>Document</title>
</head>
<body>
    <h1>View Clients</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Username</th>
                <th>Password</th>
                <th>Confirmed Password</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "JerkoiConnection.php";

                $Jerkoisql = "SELECT * FROM Jerkoiregistration WHERE Jerkoi_Type = 0";
                $Jerkoiuserres = mysqli_query($JerkoiConn, $Jerkoisql);

                if(mysqli_num_rows($Jerkoiuserres) > 0){
                    while($Jerkoiusers = mysqli_fetch_assoc($Jerkoiuserres)){
                        echo "<tr>
                        <td><p>{$Jerkoiusers['id']}</p></td>
                        <td><p>{$Jerkoiusers['fname']}</p></td>
                        <td><p>{$Jerkoiusers['lname']}</p></td>
                        <td><p>{$Jerkoiusers['email']}</p></td>
                        <td><p>{$Jerkoiusers['uname']}</p></td>
                        <td><p>{$Jerkoiusers['pass']}</p></td>
                        <td><p>{$Jerkoiusers['cpass']}</p></td>
                        <td><p>Client</p></td>";

                    if ($Jerkoiusers['Jerkoi_Status'] === '0') {
                        echo "<td><button class='Jerkoiappbtn' onclick=\"window.location.href='JerkoiApproveClient.php?Jerkoiid=" . $Jerkoiusers['id'] . "'\">Approve</button></td>";
                    } else {
                        echo "<td><p>Approved</p></td>";
                    }

                    echo "</tr>";

                    }
                }
                else{
                    echo "
                        <tr>
                            <td colspan='9'>No clients found.</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
