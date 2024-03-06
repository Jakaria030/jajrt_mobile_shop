<?php 
    require("inc/essentials.php");
    require("inc/db_config.php");
    adminLogin();

    if(isset($_GET["seen"])){
        $f_data = filteration($_GET);

        if($f_data["seen"] == "all"){
            $query = "UPDATE `user_queries` SET `seen`=?";
            $values = [1];
            
            if(crud("update",$query, $values, "i")){
                customAlert("success", "Marked all as read!");
            }else{
                customAlert("error", "Operation Failed!");
            }
        }else{
            $query = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
            $values = [1, $f_data["seen"]];
            
            if(crud("update", $query, $values, "ii")){
                customAlert("success", "Marked as read!");
            }else{
                customAlert("error", "Operation Failed!");
            }
        }
        echo<<<redirect
        <script>
            setTimeout(function(){ window.location.href = "user_queries.php"; }, 2000);
        </script>
        redirect;
    }

    if(isset($_GET["del"])){
        $f_data = filteration($_GET);

        if($f_data["del"] == "all"){
            $sql = "DELETE FROM `user_queries`";

            if($con->query($sql)){
                customAlert("success", "All data deleted!");
            }else{
                customAlert("error", "Operation Failed!");
            }
        }else{
            $query = "DELETE FROM `user_queries` WHERE `sr_no`=?";
            $values = [$f_data["del"]];
            
            if(crud("delete", $query, $values, "i")){
                customAlert("success", "Data deleted!");
            }else{
                customAlert("error", "Operation Failed!");
       
            }
        }
        echo<<<redirect
        <script>
            setTimeout(function(){ window.location.href = "user_queries.php"; }, 2000);
        </script>
        redirect;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - User Queries</title>
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
</head>
<body>
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>


    <div class="container-fluid" id="main-content"> 
        <div class="row"> 
            <div class="col-lg-10 ms-auto p-4 overflow-hidden"> 
                <h3 class="mb-4">USER QUERIES</h3>

                <!-- User Queries section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4"> 
                            <a href="?seen=all" class="btn btn-dark rounded-pill shadow-none btn-sm">
                                <i class="bi bi-check-all"></i> Mark all read
                            </a>
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm">
                                <i class="bi bi-trash"></i> Delete all
                            </a>
                        </div>

                        <div class="table-responsive-md" style="height: 600px; overflow-y: scroll;"> 
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col" width="30%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $sql = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                                    $res = $con->query($sql);
                                    
                                    $i=1;
                                    while($row = $res->fetch_assoc()){
                                        $date = date("d-m-Y", strtotime($row["datentime"]));
                                        $seen="";
                                        if($row["seen"] != 1){
                                            $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary mb-2'>Mark as read</a><br>";
                                        }
                                        $seen .= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger'>Delete</a>";
                                        echo<<<data
                                            <tr>
                                                <td>$i</td>
                                                <td>$row[name]</td>
                                                <td>$row[email]</td>
                                                <td>$row[subject]</td>
                                                <td>$row[message]</td>
                                                <td>$date</td>
                                                <td>$seen</td>
                                            </tr>
                                        data;
                                        $i++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <?php require("inc/scripts.php"); ?>
</body>
</html>