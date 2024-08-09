<?php
/**
 * NIM : 2257401031
 * NAMA : SAHRU
 * KELAS MI22A
 */
 session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
  body{
        height: 100vh;
        background-image: url(img/images1.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
  }
  .main {
        display: flex;
    }
    /*bagian login*/
    .container{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        padding: 20px 25px;
        width: 300px;
        background-color: rgba(0,0,0,.7);
        box-shadow: 0 0 10px rgba(255,255,255,.3);
    }
    .container h1{
        text-align: left;
        color: white;
        margin-bottom: 30px;
        text-transform: uppercase;
        border-bottom: 4px solid paleturquoise;;
    }
    .container label{
        text-align: left;
        color: white;
    }
    .container form input{
        width: calc(100% - 20px);
        padding: 8px 10px;
        margin-bottom: 15px;
        border: none;
        background-color: transparent;
        border-bottom: 2px solid paleturquoise;;
        color: #fff;
        font-size: 20px;
    }
    .container form button{
        width: 100%;
        padding: 5px 0;
        border: none;
        background-color:paleturquoise;;
        font-size: 18px;
        color: black;
    }   
    </style>

</head>
    <body>
    <div class="container border">
        <div class="row align-items-center py-3 px-xl-5">
            <div>
                <h1>Login</h1>

                <form action="" method="POST">
                    <label for="username">Username :</label><br>
                    <input type="text" name="username" id="username"><br><br>
                    <label for="password">Password :</label><br>
                    <input type="password" name="password" id="password"><br><br>
                    <button type="submit" name="login">Login</button><br><br>
                </form>

                <p id="error">
                    <?php 
                    if (isset($_SESSION['error'])){
                        echo "<span style='color:red'>".$_SESSION['error']."</label>";
                        unset($_SESSION['error']);
                    }
                    ?>
                </p>

    <?php 
      if(isset($_POST["login"])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT username, password FROM tbl_user WHERE username = '$username' AND password = sha1('$password');";

        $koneksi = mysqli_connect("localhost", "root", "", "db_uas_mi22a");
        $result = mysqli_query($koneksi, $sql);

        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $_SESSION['tbl_user'] = $username;
            header('location: admin.php');
        } else {
            $_SESSION['error'] = "Username / Password tidak sesuai";
            header('location: login.php');
        }
    }
    ?>
            </div>
        </div>     
    </div>
    </body>
</html>	