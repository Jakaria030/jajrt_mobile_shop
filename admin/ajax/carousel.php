<?php 
    require("../inc/db_config.php");
    require("../inc/essentials.php");
    adminLogin();


    //Add image in carousel table
    if(isset($_POST["add_image"])){

        $img_r = uploadImage($_FILES["picture"],CAROUSEL_FOLDER);

        if($img_r == "inv_img"){
            echo $img_r;
        }else if($img_r == "inv_size"){
            echo $img_r;
        }else if($img_r == "upd_failed"){
            echo $img_r;
        }else{
            $res = crud("insert", "INSERT INTO `carousel`(`image`) VALUES (?)",[$img_r], "s");
            echo $res;
        }
    }

    //get image from carousel table
    if(isset($_POST["get_carousel"])){
        $res = selectAll("carousel");
        
        while($row = $res->fetch_assoc()){
            $path = CAROUSEL_IMG_PATH;
            echo<<<data
                <div class="col-md-2 mb-3"> 
                    <div class="card bg-dark text-white">
                        <img src="$path$row[image]" class="card-img">
                        <div class="card-img-overlay text-end">
                            <button type="button" onclick="rem_image($row[sr_no])" class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
            data;
        }
    }

    //delet image from carousel table
    if(isset($_POST["rem_image"])){
        $f_data = filteration($_POST);
        
        $res = crud("select", "SELECT * FROM `carousel` WHERE `sr_no`=?", [$f_data["sr_no"]], "i");
        $img = $res->fetch_assoc();
        
        if(deleteImage($img["image"], CAROUSEL_FOLDER)){
            $res = crud("delete", "DELETE FROM `carousel` WHERE `sr_no`=?", [$f_data["sr_no"]], "i");
            echo $res;
        }else{
            echo 0;
        }
    }
?>
