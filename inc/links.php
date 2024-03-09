<?php 
    require("admin/inc/db_config.php");
    require("admin/inc/essentials.php");
    session_start();
    date_default_timezone_set("Asia/Dhaka");

    //Settins
    $settings_q = crud("select", "SELECT * FROM `settings` WHERE `sr_no`=?", [1], "i");
    $settings_r = $settings_q->fetch_assoc();

    //Contact details
    $contact_q = crud("select", "SELECT * FROM `contact_details` WHERE `sr_no`=?", [1], "i");
    $contact_r = $contact_q->fetch_assoc();

?>
<!-- Bootstrap v5.0 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<!-- Bootstrap v5.0 icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<!-- Common CSS file link -->
<link rel="stylesheet" href="css/common.css">


