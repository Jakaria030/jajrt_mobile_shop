<?php
    require("inc/essentials.php");
    require("inc/db_config.php");
    adminLogin();

    if(isset($_GET["seen"])){
        $f_data = filteration($_GET);
        $query = "UPDATE `comments` SET `seen`=? WHERE `sr_no`=?";
        $values = [1, $f_data["seen"]];
        
        if(crud("update", $query, $values, "ii")){
            customAlert("success", "Comment read!");
        }else{
            customAlert("error", "Operation Failed!");
        }
        
        echo<<<redirect
        <script>
            setTimeout(function(){ window.location.href = "video_comment.php"; }, 2000);
        </script>
        redirect;
    }

    if(isset($_GET["del"])){
        $f_data = filteration($_GET);
        $query = "DELETE FROM `comments` WHERE `sr_no`=?";
        $values = [$f_data["del"]];
        
        if(crud("delete", $query, $values, "i")){
            customAlert("success", "Comment deleted!");
        }else{
            customAlert("error", "Operation Failed!");
    
        }
        
        echo<<<redirect
        <script>
            setTimeout(function(){ window.location.href = "video_comment.php"; }, 2000);
        </script>
        redirect;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Video & Comment</title>
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
</head>
<body>
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>

    <!-- Carousel body start -->
    <div class="container-fluid" id="main-content"> 
        <div class="row"> 
            <div class="col-lg-10 ms-auto ps-4 pe-4 overflow-hidden"> 
                <h3 class="mb-2 mt-4">VIDEOS & COMMENTS</h3>

                <!-- Video section start -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3"> 
                            <h5 class="card-title m-0">Videos</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#video-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        
                        <div class="table-responsive" style="height: 450px; overflow-y: scroll;"> 
                            <table class="table table-hover border text-center" style="min-width: 1300px;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="video-data">
                                    <!-- Video data show here -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Video modal -->
                <div class="modal fade" id="video-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="video-s-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Youtub Embaded Video link</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3"> 
                                        <label class="form-label fw-bold">Video Title</label>
                                        <input type="text" name="_title" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3"> 
                                        <label class="form-label fw-bold">Video Link</label>
                                        <input type="text" name="link" class="form-control shadow-none" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="_title.value=''; link.value='';" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn btn-primary text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Video section end -->

            </div>

            <div class="col-lg-10 ms-auto ps-4 pe-4 overflow-hidden"> 
                <!-- Comment section start -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3"> 
                            <h5 class="card-title m-0">Comments</h5>
                        </div>
                        
                        <div class="table-responsive" style="height: 450px; overflow-y: scroll;"> 
                            <table class="table table-hover border text-center" style="min-width: 1300px;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" width="30%">Comment</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="comment-data">
                                <?php 
                                    $sql = "SELECT * FROM comments AS c
                                    JOIN user_cred AS u ON c.u_id = u.id
                                    JOIN videos AS v ON c.v_id = v.v_id
                                    ORDER BY sr_no DESC";
                            
                                    $res = $con->query($sql);
                            
                                    $i = 1;
                                    while($row = $res->fetch_assoc()){
                                        $date = date("d-m-Y", strtotime($row["datentime"]));
                                        $seen = "";
                                        if($row["seen"] != 1){
                                            $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary mb-2'>Mark as read</a><br>";
                                        }
                                        $seen .= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger'>Delete</a>";
                                        
                                        echo<<<data
                                            <tr class='align-middle'>
                                                <td>$i</td>
                                                <td>$row[name]</td>
                                                <td>$row[title]</td>
                                                <td>$row[comment]</td>
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
                <!-- /Comment section end -->

            </div>
        </div>
    </div>
    <!-- /Carousel body end -->

    <?php require("inc/scripts.php"); ?>
    <script src="scripts/video_comment.js"></script>
</body>
</html>