<?php
    require("inc/essentials.php");
    require("inc/db_config.php");
    session_start();

    if(isset($_SESSION["adminLogin"]) && ($_SESSION["adminId"] == true)){
        redirect("dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <!-- Link files -->
    <?php require("inc/links.php"); ?>

    <style> 
        div.login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-light">
    
    <!-- Login form start -->
    <!-- Php code -->
    <?php 
        if(isset($_POST["adminLogin"])){
            $f_data = filteration($_POST);

            $s_query = crud("select","SELECT * FROM `admin_cred` WHERE `email`=? AND `password`=?", [$f_data["email"], $f_data["password"]], "ss");

            if($s_query->num_rows == 1){
                $row = $s_query->fetch_assoc();
                $_SESSION["adminLogin"] = true;
                $_SESSION["adminId"] = $row["sr_no"];
                redirect("dashboard.php");
            }else{
                echo<<<alrt
                <script> 
                    alert("Login failed - Invalid Credentials!");
                </script>   
                alrt;
            }
        }
    ?>
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form action="" method="POST">
            <h4 class="bg-primary text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="email" type="email" class="form-control shadow-none text-center" placeholder="Admin Email" required>
                </div>
                <div class="mb-4">
                    <input name="password" type="password" class="form-control shadow-none text-center" placeholder="Admin Password" required>
                </div>
                <button name="adminLogin" type="submit" class="btn text-white bg-primary shadow-none">LOGIN</button>
            </div>
        </form>
    </div>
    <!-- Login form end -->


    <?php require("inc/scripts.php"); ?>
</body>
</html>