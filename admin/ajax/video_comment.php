<?php 
    require("../inc/db_config.php");
    require("../inc/essentials.php");
    adminLogin();

    //Add video link
    if(isset($_POST["add_video"])){

        if(crud("insert", "INSERT INTO `videos`(`link`) VALUES (?)", [$_POST["video"]], "s")){
            echo 1;
        }else{
            echo "ins_failed";
        }
    }

    //get video from video table
    if(isset($_POST["get_video"])){
        $res = selectAll("videos");
        $data = "";

        $i = 1;
        while($row = $res->fetch_assoc()){
            $status = "<button onclick='toggle_status($row[v_id], 1)' class='btn btn-danger btn-sm shadow-none'>Inactive</buuton>";
            if($row["status"]){
                $status = "<button onclick='toggle_status($row[v_id], 0)' class='btn btn-dark btn-sm shadow-none'>Active</buuton>";
            }
            $date = date("d-m-Y", strtotime($row["datentime"]));

            $data .= "
                <tr class='align-middle'>
                    <td>$i</td>
                    <td>$row[link]</td>
                    <td>$date</td>
                    <td>$status</td>
                    <td><button type='button' onclick='remove_video($row[v_id])' class='btn btn-danger btn-sm shadow-none'><i class='bi bi-trash'></i> Delete</button></td>
                </tr>
            ";
            $i++;    
        }

        echo $data;
    }
    
    //For toggle status
    if(isset($_POST["toggle_status"])){
        $f_data = filteration($_POST);

        $v_query = crud("update", "UPDATE `videos` SET `status`=? WHERE `v_id`=?", [$f_data["value"], $f_data["v_id"]], "ii");

        if($v_query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //For remove video
    if(isset($_POST["remove_video"])){
        $f_data = filteration($_POST);

        $d_query = crud("delete", "DELETE FROM `videos` WHERE `v_id`=?", [$f_data["v_id"]], "i");

        if($d_query){
            echo 1;
        }else{
            echo 0;
        }
    }
?>
