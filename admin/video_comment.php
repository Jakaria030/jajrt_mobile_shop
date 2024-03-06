<?php 
    require("inc/essentials.php");
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
</head>
<body>
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>

    <!-- Carousel body start -->
    <div class="container-fluid" id="main-content"> 
        <div class="row"> 
            <div class="col-lg-10 ms-auto p-4 overflow-hidden"> 
                <h3 class="mb-4">VIDEOS & COMMENTS</h3>

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

                        <div class="table-responsive"> 
                            <table class="table table-hover border text-center" style="min-width: 1300px">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
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
                                        <label class="form-label fw-bold">Video Link</label>
                                        <input type="text" name="video" class="form-control shadow-none" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="video.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn btn-primary text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Video section end -->

            </div>
        </div>
    </div>
    <!-- /Carousel body end -->

    <?php require("inc/scripts.php"); ?>
    <script src="scripts/video_comment.js"></script>
</body>
</html>