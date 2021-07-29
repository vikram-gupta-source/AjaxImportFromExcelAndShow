<?php
session_start();
include "config.php";
$message = "";
if (count($_POST) > 0) {

    $result = mysqli_query($conn, "SELECT * FROM login_user WHERE user_name='" . $_POST["user_name"] . "' and password = '" . $_POST["password"] . "'");
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
    } else {
        $message = "Invalid Username or Password!";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
}
?>
<html>

<head>
    <title>Creaa Employee Details | Admin Login </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        
        body {
            margin: 0;
            padding: 0;
            background-color: #b1f1f1;
        }

        .box {
            width: 500px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 200px;
        }
    </style>
</head>

<body class="container">
    <form name="frmUser" class="form box" method="post" action="" >
        <div class="message">
            <?php if ($message != "") 
            {
              echo $message;
          } ?>
        </div>
        <h3 >Admin Login </h3>
        Username:<br>
        <input type="text" name="user_name">
        <br>
        Password:<br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset">
    </form>
</body>

</html>