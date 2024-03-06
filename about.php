<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
    <title>JAJRT Mobile Shop - About</title>

    <style> 
        .box{
            border-top-color: var(--c_color1) !important;
        }
    </style>
    
</head>
<body class="bg-light">
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>
    
    <!-- About us -->
    <div class="my-5 px-4"> 
        <h2 class="fw-bold text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
        Quia at aperiam, nihil eaque nobis deleniti illo. Placeat dicta hic pariatur.</p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Natus maiores doloribus autem veritatis quis, sit officiis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Natus maiores doloribus autem veritatis quis, sit officiis.</p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1"> 
                <img src="images/about/about.jpg" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5"> 
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4"> 
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/customers.png" width="70px">
                    <h4 class="mt-3">500+ CUSTOMERS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4"> 
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/categories.png" width="70px">
                    <h4 class="mt-3">100+ CATEGORIES</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4"> 
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/reviews.png" width="70px">
                    <h4 class="mt-3">200+ REVIEWS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4"> 
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/staffs.png" width="70px">
                    <h4 class="mt-3">10+ STAFFS</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="fw-bold text-center mt-5">SUPPORT TEAM</h3>
    <div class="h-line bg-dark mb-5"></div>
    <div class="container px-4"> 
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php 
                    $res = selectAll("team_details");
                    $path = ABOUT_IMG_PATH;

                    while($row = $res->fetch_assoc()){
                        echo<<<data
                        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                            <img src="$path$row[picture]" class="w-100">
                            <h5 class="mt-2">$row[name]</h5>
                        </div>
                        data;
                    }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- /About us -->

    <!-- Footer -->
    <?php require("inc/footer.php"); ?>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
        },
        breakpoints:{
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 3,
            },
        }
      });
    </script>
 
</body>
</html>