<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
    <title>JAJRT Mobile Shop - Mobile</title>
</head>
<body class="bg-light">
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>
    
    <!-- All collection of mobile start -->
    <div class="my-5 px-4"> 
        <h2 class="fw-bold h-font text-center">ALL COLLECTIONS OF MOBILE</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 col-md-12 mb-lg-0 mb-4 px-lg-4"> 
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="filterDropdown">

                            <!-- Price wise -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3 d-flex align-items-center justify-content-between" style="font-size: 18px;"> 
                                    <span>PRICE</span>
                                    <button class="btn btn-sm btn-outline-secondary shadow-none">Reset</button>
                                </h5>
                                <div class="mb-2"> 
                                    <input type="checkbox" value="1" id="1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="1">Low To Hight</label>
                                </div>
                                <div class="mb-2"> 
                                    <input type="checkbox" value="2" id="2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="2">High To Low</label>
                                </div>
                            </div>

                            <!-- Category wise -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3 d-flex align-items-center justify-content-between" style="font-size: 18px;"> 
                                    <span>CATEGORY</span>
                                    <button class="btn btn-sm btn-outline-secondary shadow-none">Reset</button>
                                </h5>

                            <?php 
                                $sql = "SELECT * FROM `categories` GROUP BY `category`";
                                $category_res = $con->query($sql);
                                
                                while($row = $category_res->fetch_assoc()){
                                    echo<<<data
                                    <div class="mb-2"> 
                                        <input type="checkbox"  value="$row[category]" id="$row[c_id]" class="form-check-input shadow-none me-1">
                                        <label class="form-check-label" for="$row[c_id]">$row[category]</label>
                                    </div>
                                    data;
                                }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-10 col-md-12">
                <div class="container m-0">
                    <div class="row">

                    <?php
                        $product_res = selectAll("products");
                        $path = MOBILE_IMG_PATH;

                        while($row = $product_res->fetch_assoc()){
                            echo<<<data
                            <div class="col-lg-3 col-md-6 my-3"> 
                                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                    <img src="$path$row[b_profile]" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">$row[mobile_name]</h5>
                                        <div class="rating mb-3"> 
                                            <span class="badge rounded-pill bg-light">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </span>
                                        </div>
                                        
                                        <h6 class="mb-4">৳$row[b_price]</h6> 

                                        <div class="d-flex justify-content-evenly mb-2"> 
                                            <a href="#" class="btn btn-sm btn-primary shadow-none">Add To Cart <i class="bi bi-cart-check"></i></a>
                                            <a href="description.php?description&p_id=$row[p_id]" class="btn btn-sm btn-primary shadow-none">Description</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            data;
                        }
                    ?>
                        
                    </div>  
                </div>
            </div>

        </div>
    </div>
    <!-- /All collection of mobile end -->

    <!-- Footer -->
    <?php require("inc/footer.php"); ?>

</body>
</html>