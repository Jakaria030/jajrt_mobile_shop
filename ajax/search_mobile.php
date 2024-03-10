<?php 
    require("../admin/inc/db_config.php");
    require("../admin/inc/essentials.php");
    date_default_timezone_set("Asia/Dhaka");

    if(isset($_POST["search_mobile"])){
        $f_data = filteration($_POST);
        
        $res = crud("select", "SELECT `p_id`, `mobile_name`, `b_model`, `small_description`, `b_price`, `b_profile` FROM `products` WHERE CONCAT(`mobile_name`, `b_model`) LIKE ?", ["%$f_data[searchKey]%"], "s");

        $path = MOBILE_IMG_PATH;
        $data="";

        $i = 1;
        while($row = $res->fetch_assoc()){
            $data .= "
            <li>
            <a class='dropdown-item' href='description.php?description&p_id=$row[p_id]'>
                <div style='width:400px; overflow: hidden'>
                    <div class='row'> 
                        <div class='col-lg-3'>
                            <img src='$path$row[b_profile]' width='100px'>
                        </div>
                        <div class='col-lg-9'> 
                            <h5 style='overflow: hidden; white-space: wrap;'>$row[mobile_name]</h5>
                            <p style='overflow: hidden; white-space: wrap;'>$row[small_description]</p>
                            <p style='overflow: hidden; white-space: wrap;'>Price: ৳$row[b_price]</p>
                        </div>
                    </div>
                </div>
            </a>
        </li>
            ";
            $i++;
        }
        
        echo $data;
    }
?>