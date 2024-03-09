<?php 
    require("../inc/db_config.php");
    require("../inc/essentials.php");
    adminLogin();


    //Add category in categories table
    if(isset($_POST["add_category"])){
        $f_data = filteration($_POST);

        $res = crud("insert", "INSERT INTO `categories`(`category`, `mobile_name`) VALUES (?,?)",[$f_data["category"], $f_data["mobile_name"]], "ss");
        echo $res;
    }

    //get category from categories table
    if(isset($_POST["get_category"])){
        $res = selectAll("categories");
        $data = "";
        $i = 1;
        while($row = $res->fetch_assoc()){
            $date = date("d-m-Y", strtotime($row["datentime"]));

            $data .= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[category]</td>
                <td>$row[mobile_name]</td>
                <td>$date</td>
                <td><button type='button' onclick='rem_category($row[c_id])' class='btn btn-danger btn-sm shadow-none'><i class='bi bi-trash'></i> Delete</button></td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }

    //delete category from categories table
    if(isset($_POST["rem_category"])){
        $res = crud("delete", "DELETE FROM `categories` WHERE `c_id`=?", [$_POST["c_id"]], "i");
        echo $res;
    }

    //Get product from products table
    if(isset($_POST["get_product"])){
        $sql = "SELECT `p_id`, `mobile_name`, `b_model`, `b_quantity`, `b_price`, `b_profile`, `datentime` FROM `products` WHERE 1";
        $res = $con->query($sql);
        
        $path = MOBILE_IMG_PATH;

        $data = "";
        $i = 1;
        while($row = $res->fetch_assoc()){
            $date = date("d-m-Y", strtotime($row["datentime"]));
            $data .= "
                <tr class='align-middle'>
                    <td>$i</td>
                    <td>
                        <img src='$path$row[b_profile]' width='100px'><br>
                        $row[mobile_name]
                    </td>
                    <td>$row[b_model]</td>
                    <td>$row[b_quantity]</td>
                    <td>৳$row[b_price]</td>
                    <td>$date</td>
                    <td><button type='button' onclick='rem_product($row[p_id])' class='btn btn-danger btn-sm shadow-none'><i class='bi bi-trash'></i> Delete</button></td>
                </tr>
            ";
            $i++;
        }

        echo $data;
    }

    //delete product from products table
    if(isset($_POST["rem_product"])){
        $f_data = filteration($_POST);
        
        $res = crud("select", "SELECT `b_profile` FROM `products` WHERE `p_id`=?", [$f_data["p_id"]], "i");
        $img = $res->fetch_assoc();
        
        if(deleteImage($img["b_profile"], MOBILE_FOLDER)){
            $res = crud("delete", "DELETE FROM `products` WHERE `p_id`=?", [$f_data["p_id"]], "i");
            echo $res;
        }else{
            echo 0;
        }
    }
?>
