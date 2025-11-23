<?php
    session_start();

    include "JerkoiConnection.php";

    if(isset($_POST['JerkoiLogIn'])){
        $Jerkoiuname = $_POST['uname'];
        $Jerkoipass = $_POST['pass'];

        $Jerkoiverifysql =  "SELECT * FROM Jerkoiregistration WHERE uname = '$Jerkoiuname'";

        $Jerkoiverify = mysqli_query($JerkoiConn,$Jerkoiverifysql);

        if(mysqli_num_rows($Jerkoiverify)===1)
        {
            $Jerkoiuser = mysqli_fetch_assoc($Jerkoiverify);

            $Jerkoivpass = $Jerkoiuser['pass'];
            $Jerkoiusername = $Jerkoiuser['uname'];
            $Jerkoitype = $Jerkoiuser['Jerkoi_Type'];
            $Jerkoistatus = $Jerkoiuser['Jerkoi_Status'];
            $Jerkoifname = $Jerkoiuser['fname'];
            
            if ($Jerkoipass === $Jerkoivpass) {

                switch($Jerkoitype){
                    case '0':
                        if($Jerkoistatus === '1'){

                            $_SESSION['Jerkoiusername']=$Jerkoiusername;
                            echo "<script>
                                alert('Successful Log in. Welcome, Client {$Jerkoifname}.');

                                parent.frames['nav_column'].location.href = 'JerkoiClientNav.php';
                                parent.frames['mid_column'].location.href = 'JerkoiClientProduct.php';
                            </script>";
                        }
                        else{
                            header("Location: JerkoiLogin.php?message=Your account is still not approved by the admin.");
                            exit(); 
                        }
                        break;
                    case '1':
                        $_SESSION['Jerkoiusername']=$Jerkoiusername;
                        echo "<script>
                            alert('Successful Log in. Welcome, Admin {$Jerkoifname}.');

                            parent.frames['nav_column'].location.href = 'JerkoiAdminNav.php';
                            parent.frames['mid_column'].location.href = 'JerkoiAdminProduct.php';
                        </script>";
                        break;
                    default:
                        header("Location: JerkoiGuestProduct.php");
                }
                exit();
            }
            else{
                header("Location: JerkoiLogin.php?message=Incorrect Password");
                exit();
            }
        }
        else{
            header("Location: JerkoiLogin.php?message=User does not exist");
            exit();
        }
    }
?>
