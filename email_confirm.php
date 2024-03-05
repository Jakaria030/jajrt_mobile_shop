<?php 
    require("admin/inc/db_config.php");
    require("admin/inc/essentials.php");

    if(isset($_GET["email_confirmation"])){
        $f_data = filteration($_GET);

        $res = crud("select", "SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? LIMIT 1", [$f_data["email"], $f_data["token"]], "ss");

        if($res->num_rows == 1){
            $row = $res->fetch_assoc();
            if($row["is_verified"] == 1){
                echo "<script>alert('Email already verified!')</script>";
            }else{
                $u_query = crud("update", "UPDATE `user_cred` SET `is_verified`=? WHERE `id`=?", [1, $row["id"]], "ii");
                if($u_query){
                    echo "<script>alert('Email verification successful!')</script>";
                }else{
                    echo "<script>alert('Email verification failed! Server down!')</script>";
                }
            }
            redirect("index.php");
        }else{
            echo "<script>alert('Invalide Link!')</script>";
        }
    }
?>