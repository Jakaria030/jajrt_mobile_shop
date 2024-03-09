<?php 
    require("inc/db_config.php");
    require("inc/essentials.php");
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Mobile</title>
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
</head>
<body>
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>

    <!-- Mobile body start -->
    <div class="container-fluid" id="main-content"> 
        <div class="row"> 
            <div class="col-lg-10 ms-auto p-4 overflow-hidden"> 
                <h3 class="mb-4">MOBILES</h3>

                <!-- Category section start -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3"> 
                            <h5 class="card-title m-0">Categories</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#category-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive" style="height: 400px; overflow-y: scroll;"> 
                            <table class="table table-hover border text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="category-data">
                                    <!-- User data show here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Mobile modal -->
                <div class="modal fade" id="category-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="category_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Category</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3"> 
                                        <label class="form-label fw-bold">Category Name</label>
                                        <input type="text" name="category" id="category_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3"> 
                                        <label class="form-label fw-bold">Product Name</label>
                                        <input type="text" name="mobile_name" id="mobile_inp" class="form-control shadow-none" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="category_inp.value='', mobile_inp.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn btn-primary text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /category section end -->

                <!-- Product section start -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3"> 
                            <h5 class="card-title m-0">Products</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm">
                                <a href="add_product.php" class="text-decoration-none text-white"><i class="bi bi-plus-square"></i> Add </a>
                            </button>
                        </div>

                        <div class="table-responsive" style="height: 400px; overflow-y: scroll;"> 
                            <table class="table table-hover border text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="product-data">
                                    <!-- User data show here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <!-- Product section end -->
            </div>
        </div>
    </div>
    <!-- /Mobile body end -->

    <?php require("inc/scripts.php"); ?>
    <script src="scripts/mobile.js"></script>
</body>
</html>