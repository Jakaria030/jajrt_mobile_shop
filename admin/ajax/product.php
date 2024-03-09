<?php 
    require("../inc/db_config.php");
    require("../inc/essentials.php");
    adminLogin();


    //Add product in product table
    if(isset($_POST["add_product"])){
        $f_data = filteration($_POST);

        $img_r = uploadImage($_FILES["b_profile"], MOBILE_FOLDER);
        
        if($img_r == "inv_img"){
            echo $img_r;
        }else if($img_r == "inv_size"){
            echo $img_r;
        }else if($img_r == "upd_failed"){
            echo $img_r;
        }else{
            $sql = "INSERT INTO `products`(`mobile_name`, `b_model`, `b_quantity`, `b_price`, `b_profile`, `small_description`, `description`, `warranty`, `p_build`, `p_weight`, `p_dimensions`, `n_sim`, `n_speed`, `n_2g_bands`, `n_3g_bands`, `n_4g_bands`, `n_5g_bands`, `d_size`, `d_type`, `d_resolution`, `p_cpu`, `p_gpu`, `p_chipset`, `m_internal`, `m_card_slot`, `m_video`, `m_triple`, `m_features`, `s_video`, `s_single`, `s_features`, `o_os`, `c_nfc`, `c_usb`, `c_radio`, `c_wifi`, `c_bluetooth`, `c_jack`, `f_sensors`, `b_type`, `b_charging`, `t_performance`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $values = [$f_data["mobile_name"], $f_data["b_model"], $f_data["b_quantity"], $f_data["b_price"], $img_r, $f_data["small_description"], $f_data["description"], $f_data["warranty"], $f_data["p_build"], $f_data["p_weight"], $f_data["p_dimensions"], $f_data["n_sim"], $f_data["n_speed"], $f_data["n_2g_bands"], $f_data["n_3g_bands"], $f_data["n_4g_bands"], $f_data["n_5g_bands"], $f_data["d_size"], $f_data["d_type"], $f_data["d_resolution"], $f_data["p_cpu"], $f_data["p_gpu"], $f_data["p_chipset"], $f_data["m_internal"], $f_data["m_card_slot"], $f_data["m_video"], $f_data["m_triple"], $f_data["m_features"], $f_data["s_video"], $f_data["s_single"], $f_data["s_features"], $f_data["o_os"], $f_data["c_nfc"], $f_data["c_usb"], $f_data["c_radio"], $f_data["c_wifi"], $f_data["c_bluetooth"], $f_data["c_jack"], $f_data["f_sensors"], $f_data["b_type"], $f_data["b_charging"], $f_data["t_performance"]];

            $dtypes = "ssiissssssssssssssssssssssssssssssssssssss";

            $res = crud("insert", $sql, $values, $dtypes);

            echo $res;
        }
    }
?>
