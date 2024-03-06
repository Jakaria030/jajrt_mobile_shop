<?php 
    require("../inc/db_config.php");
    require("../inc/essentials.php");
    adminLogin();


    //Get general data from setting table
    if(isset($_POST["get_general"])){
        $res = crud("select", "SELECT * FROM `settings` WHERE `sr_no`=?", [1], "i");
        $data = $res->fetch_assoc();
        $json_data = json_encode($data);
        
        echo $json_data;
    }

    //Update setting table
    if(isset($_POST["upd_general"])){
        $f_data = filteration($_POST);

        $res = crud("update", "UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `sr_no`=?",  [$f_data["site_title"], $f_data["site_about"], 1], "ssi");
       
        echo $res;
    }

    //Update shutdown in setting table
    if(isset($_POST["upd_shutdown"])){
        $f_data = ($_POST["upd_shutdown"] == 0) ? 1 : 0;

        $res = crud("update", "UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?", [$f_data, 1], "ii");

        echo $res;
    }

    //Get contacts data
    if(isset($_POST["get_contacts"])){
        $res = crud("select", "SELECT * FROM `contact_details` WHERE `sr_no`=?", [1], "i");
        $data = $res->fetch_assoc();
        $json_data = json_encode($data);

        echo $json_data;
    }

    //Update contacts details table
    if(isset($_POST["upd_contacts"])){
        $f_data = filteration($_POST);
        
        $query = "UPDATE `contact_details` SET `address`=?, `gmap`=?, `phn1`=?, `phn2`=?, `email`=?, `fb`=?, `insta`=?, `tw`=?, `iframe`=? WHERE `sr_no`=?";
        $values = [$f_data["address"], $f_data["gmap"], $f_data["phn1"], $f_data["phn2"], $f_data["email"], $f_data["fb"], $f_data["insta"], $f_data["tw"], $f_data["iframe"], 1];
        $dtypes = "sssssssssi";

        $res = crud("update", $query, $values, $dtypes);

        echo $res;
    }

    //Add team member in team details table
    if(isset($_POST["add_member"])){
        $f_data = filteration($_POST);

        $img_r = uploadImage($_FILES["picture"],ABOUT_FOLDER);

        if($img_r == "inv_img"){
            echo $img_r;
        }else if($img_r == "inv_size"){
            echo $img_r;
        }else if($img_r == "upd_failed"){
            echo $img_r;
        }else{
            $res = crud("insert", "INSERT INTO `team_details` (`name`, `picture`) VALUES (?,?)",[$f_data["name"], $img_r], "ss");
            echo $res;
        }
    }

    //get team members from team details table
    if(isset($_POST["get_members"])){
        $res = selectAll("team_details");
        
        while($row = $res->fetch_assoc()){
            $path = ABOUT_IMG_PATH;
            echo<<<data
                <div class="col-md-2 mb-3"> 
                    <div class="card bg-dark text-white" style="height: 400px;">
                        <img src="$path$row[picture]" class="card-img" height="350px">
                        <div class="card-img-overlay text-end">
                            <button type="button" onclick="rem_member($row[sr_no])" class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash"></i> Delete</button>
                        </div>
                        <p class="card-text text-center px-3 py-2">$row[name]</p>
                    </div>
                </div>
            data;
        }
    }

    //delet image from team details table
    if(isset($_POST["rem_member"])){
        $f_data = filteration($_POST);
        
        $res = crud("select", "SELECT * FROM `team_details` WHERE `sr_no`=?", [$f_data["sr_no"]], "i");
        $img = $res->fetch_assoc();
        
        if(deleteImage($img["picture"], ABOUT_FOLDER)){
            $res = crud("delete", "DELETE FROM `team_details` WHERE `sr_no`=?", [$f_data["sr_no"]], "i");
            echo $res;
        }else{
            echo 0;
        }
    }

    
?>
