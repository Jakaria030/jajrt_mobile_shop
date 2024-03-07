<?php 
    require("../admin/inc/db_config.php");
    require("../admin/inc/essentials.php");
    date_default_timezone_set("Asia/Dhaka");

    //For PHP Mailer 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Send mail
    function sendMail($type, $email, $token){
        require ("../inc/PHPMailer/SMTP.php");
        require ("../inc/PHPMailer/PHPMailer.php");
        require ("../inc/PHPMailer/Exception.php");

        if($type == "email_confirmation"){
            $page = "email_confirm.php";
            $subject = "Account Verification Link For JAJRT-Mobile-Shop.";
            $content = "Thanks for registration! Click the link to verify the account.";
        }else{
            $page = "index.php";
            $subject = "Account Password Reset Link.";
            $content = "Reset Your Account Password.";
        }

        $mail = new PHPMailer(true);

        try{
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = "smtp.gmail.com";                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = "avronil899@gmail.com";                 //SMTP username
            $mail->Password   = "depbqlicmrjjsszf";                     //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom("avronil899@gmail.com", "Avro Nil");
            $mail->addAddress($email);                                  //Add a recipient
        
            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = " $content <br>
                            <a href='".SITE_URL."$page?$type&email=$email&token=$token"."'>CLICK ME!</a>
                            ";
        
            $mail->send();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    //For register
    if(isset($_POST["register"])){
        $f_data = filteration($_POST);
        
        //Check user exist or not
        $u_exist = crud("select", "SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$f_data["email"], $f_data["phonenum"]], "ss");
        if($u_exist->num_rows != 0){
            $row = $u_exist->fetch_assoc();
            $data = "";
            if($row["email"] == $f_data["email"]){
                $data = "email_already";
            }else{
                $data = "phone_already";
            }
            echo $data;
            exit;
        }
        
        //Upload user image to server
        $img = uploadUserImage($_FILES["profile"]);

        if($img == "inv_img"){
            echo "inv_img";
            exit;
        }else if($img == "upd_falied"){
            echo "upd_failed";
            exit;
        }

        //Match password and confirm password
        if($f_data["pass"] != $f_data["cpass"]){
            echo "pass_mismatch";
            exit;
        }

        //For email verification
        $token = bin2hex(random_bytes(16));
        if(!(sendMail("email_confirmation", $f_data["email"], $token))){
            echo "mail_failed";
            exit;
        }

        //Hash password and insert
        $enc_pass = password_hash($f_data["pass"], PASSWORD_BCRYPT);
        $query = "INSERT INTO `user_cred`(`name`, `phonenum`, `email`, `address`, `profile`, `password`, `token`) VALUES (?,?,?,?,?,?,?)";
        $values = [$f_data["name"], $f_data["phonenum"], $f_data["email"], $f_data["address"], $img, $enc_pass, $token];
        $dtypes = "sssssss";

        if(crud("insert", $query, $values, $dtypes)){
            echo 1;
        }else{
            echo "ins_falied";
        }
    }

    //For user login
    if(isset($_POST["login"])){
        $f_data = filteration($_POST);

        //Check user exist or not
        $u_exist = crud("select", "SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$f_data["email_mob"], $f_data["email_mob"]], "ss");

        if($u_exist->num_rows == 0){
            echo "inv_email_mob";
        }else{
            $row = $u_exist->fetch_assoc();
            if($row["status"] == 0){
                echo "inactive";
            }else if($row["is_verified"] == 0){
                echo "not_verified";
            }else{
                if(!password_verify($f_data["pass"], $row["password"])){
                    echo "invalid_pass";
                }else{
                    session_start();
                    $_SESSION["login"] = true;
                    $_SESSION["uId"] = $row["id"];
                    $_SESSION["uName"] = $row["name"];
                    $_SESSION["uPhone"] = $row["phonenum"];
                    $_SESSION["uEmail"] = $row["email"];
                    $_SESSION["uPic"] = $row["profile"];
                    echo 1;
                }
            }
        }
    }

    //For forgot password
    if(isset($_POST["forgot_pass"])){
        $f_data = filteration($_POST);

        //Check user exist or not
        $u_exist = crud("select", "SELECT * FROM `user_cred` WHERE `email`=? LIMIT 1", [$f_data["email"]], "s");

        if($u_exist->num_rows == 0){
            echo "inv_email";
        }else{
            $row = $u_exist->fetch_assoc();
            if($row["status"] == 0){
                echo "inactive";
            }else if($row["is_verified"] == 0){
                echo "not_verified";
            }else{
                //Send reset link to email
                $token = bin2hex(random_bytes(16));
                if(!(sendMail("account_recovery", $f_data["email"], $token))){
                    echo "mail_failed";
                }else{
                    $date = date("Y-m-d");
                    $res = crud("update", "UPDATE `user_cred` SET `token`=?, `token_exp`=? WHERE `id`=?", [$token, $date, $row["id"]], "ssi");

                    if($res){
                        echo 1;
                    }else{
                        echo "upd_failed";
                    }
                }
            }
        }
    }

    //For update pass
    if(isset($_POST["recover_pass"])){
        $f_data = filteration($_POST);
        
        if($f_data["pass"] != $f_data["cpass"]){
            echo "pass_mismatch";
            exit;
        }

        $enc_pass = password_hash($f_data["pass"], PASSWORD_BCRYPT);

        $u_query = crud("update", "UPDATE `user_cred` SET `password`=?, `token`=?, `token_exp`=? WHERE `email`=? AND `token`=?", [$enc_pass, NULL, NULL, $f_data["email"], $f_data["token"]], "sssss");

        if($u_query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //For insert comment
    if(isset($_POST["comment"])){
        $f_data = filteration($_POST);
        $query = crud("insert", "INSERT INTO `comments`(`v_id`, `u_id`, `comment`) VALUES (?, ?, ?)", [$f_data["v_id"], $f_data["u_id"], $f_data["comment"]], "iis");
        
        if($query){
            echo 1;
        }
    }

    if(isset($_POST["get_comment"])){
        $sql = "SELECT u.name, u.profile, c.comment 
                FROM comments AS c
                JOIN user_cred AS u ON c.u_id = u.id
                JOIN videos AS v ON c.v_id = v.v_id
                WHERE v.status = ?
                ORDER BY sr_no DESC";

        $res = crud("select", $sql, [1], "i");
        $path = USERS_IMG_PATH;

        $data = "";
        while($row = $res->fetch_assoc()){
            $data .= "<figure>
                <blockquote class='blockquote'>
                <div class='d-flex align-items-center mb-3 mt-2'> 
                    <img src='$path$row[profile]' loading='lazy' class='rounded-circle' width='30px'>
                    <h6 class='m-0 ms-2'>$row[name]</h6>
                </div>
                </blockquote>
                <figcaption class='blockquote-footer'>
                    <span>$row[comment]</span>
                </figcaption>
            </figure>";
        }

        echo $data;
    }
?>