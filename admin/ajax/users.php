<?php 
    require("../inc/db_config.php");
    require("../inc/essentials.php");
    adminLogin();

    //For get or search users
    if(isset($_POST["get_or_search_user"])){
        $f_data = filteration($_POST);
        
        $res = crud("select", "SELECT * FROM `user_cred` WHERE CONCAT(`name`, `phonenum`, `email`, `address`) LIKE ?", ["%$f_data[searchKey]%"], "s");

        $path = USERS_IMG_PATH;
        $data="";

        if($res->num_rows > 0){
            $i = 1;
            while($row = $res->fetch_assoc()){
                $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";
    
                if($row["is_verified"] == 1){
                    $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
                }
    
                $status = "<button onclick='toggle_status($row[id], 0)' class='btn btn-dark btn-sm shadow-none'>Active</buuton>";
                if(!$row["status"]){
                    $status = "<button onclick='toggle_status($row[id], 1)' class='btn btn-danger btn-sm shadow-none'>Inactive</buuton>";
                }
                $date = date("d-m-Y", strtotime($row["datentime"]));
                $data.= "
                    <tr class='align-middle'>
                        <td>$i</td>
                        <td>
                            <img src='$path$row[profile]' width='55px'/><br>
                            $row[name]
                        </td>
                        <td>+880$row[phonenum]</td>
                        <td>$row[email]</td>
                        <td>$row[address]</td>
                        <td>$verified</td>
                        <td>$status</td>
                        <td>$date</td>
                        <td><button type='button' onclick='remove_user($row[id])' class='btn btn-danger btn-sm shadow-none'><i class='bi bi-trash'></i> Delete</button></td>
                    </tr>
                ";
                $i++;
            }
        }else{
            $data .= "<tr class='align-middle'><td class='text-danger'>No record found!</td></tr>";
        }
        echo $data;
    }


    //For toggle status
    if(isset($_POST["toggle_status"])){
        $f_data = filteration($_POST);

        $u_query = crud("update", "UPDATE `user_cred` SET `status`=? WHERE `id`=?", [$f_data["value"], $f_data["id"]], "ii");

        if($u_query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //For remove user
    if(isset($_POST["remove_user"])){
        $f_data = filteration($_POST);

        $d_query = crud("delete", "DELETE FROM `user_cred` WHERE `id`=?", [$f_data["id"]], "i");

        if($d_query){
            echo 1;
        }else{
            echo 0;
        }
    }

?>
