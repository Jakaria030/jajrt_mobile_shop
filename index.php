<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
    <title>JAJRT Mobile Shop - Home</title>
    
    <style>
        .availability-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }
        
        @media screen and (max-width: 575px) {
            .availability-form{
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
</head>
<body class="bg-light">
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>

    <!-- Carousel start -->
    <div class="container px-lg-4 mt-4"> 
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">

            <?php
                $res = selectAll("carousel");
                $path = CAROUSEL_IMG_PATH;
                
                while($row = $res->fetch_assoc()){
                    echo<<<data
                    <div class="swiper-slide">
                        <img src="$path$row[image]" class="w-100 d-block"/>
                    </div>
                    data;
                }
            ?>

            </div>
        </div>
    </div>  
    <!-- /Carousel end -->


    <!-- Shope Cart start -->
    <h2 class="mt-5 pt-4 mb-4 text-center font-weight-bold h-font">MOBILE</h2>   
    <div class="container">
        <div class="row">
            
            <?php
                $sql = "SELECT `p_id`, `mobile_name`, `b_price`, `b_profile` FROM `products` ORDER BY `p_id` DESC LIMIT 3";
                $product_q = $con->query($sql);
                $path = MOBILE_IMG_PATH;

                while($product_r = $product_q->fetch_assoc()){
                    echo<<<data
                    <div class="col-lg-3 col-md-6 my-3"> 
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="$path$product_r[b_profile]" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title">$product_r[mobile_name]</h5>
                                <div class="rating mb-3"> 
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </div>
                                
                                <h6 class="mb-4">৳$product_r[b_price]</h6> 
        
                                <div class="d-flex justify-content-evenly mb-2"> 
                                    <a href="#" class="btn btn-sm btn-primary shadow-none">Add To Cart <i class="bi bi-cart-check"></i></a>
                                    <a href="description.php?description&p_id=$product_r[p_id]" class="btn btn-sm btn-primary shadow-none">Description</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    data;
                }
            ?>

            <div class="col-lg-3 col-md-6 my-3">
                <?php 
                    $v_res = crud("select", "SELECT `v_id`, `link` FROM `videos` WHERE `status`=? LIMIT 1", [1], "i");
                    $row = $v_res->fetch_assoc();

                    if($v_res->num_rows> 0){
                        echo<<<iframe
                        <iframe width="300" height="auto" src="$row[link]" title="YouTube video player" allowfullscreen></iframe>
                        iframe;
                    }
                ?>
                <form id="comment-form">
                <?php
                    if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
                    echo<<<data
                    <div class="input-group mb-4 mt-3">
                        <input type="hidden" name="v_id" value="$row[v_id]">
                        <input type="hidden" name="u_id" value="$_SESSION[uId]">
                        <input type="text" name="comment" class="form-control shadow-none" placeholder="Write your comment">
                        <button class="btn btn-primary shadow-none" type="submit">SEND</button>
                    </div>
                    data;
                    }
                ?>
                </form>
                <div id="comment-data" class="p-2" style="height: 350px; overflow-y: scroll;">
                    <!-- comment here -->
                </div>                                
            </div>
        </div>

        <div class="col-lg-12 text-center mt-5"> 
            <a href="mobile.php" class="btn btn-sm btn-outline-primary rounded-0 fw-bold shadow-none">More Mobiles >>></a>
        </div>
    </div>
    <!-- /Shope Cart end -->

    <!-- Testimonials start -->
    <h2 class="mt-5 pt-4 mb-4 text-center font-weight-bold">TESTIMONIALS</h2>
    <div class="container mt-5"> 
        <!-- Carousel 2 -->
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-white p-4">
                    <div class="d-flex align-items-center mb-3"> 
                        <img src="images/users/tmp.jpg" loading="lazy" class="rounded-circle" width="30px">
                        <h6 class="m-0 ms-2">Jakaria</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dolorum sed impedit totam facilis architecto. Voluptatem voluptates assumenda eligendi at.</p>
                    <div class="rating">
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="d-flex align-items-center mb-3"> 
                        <img src="images/users/tmp.jpg" loading="lazy" class="rounded-circle" width="30px">
                        <h6 class="m-0 ms-2">Jakaria</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dolorum sed impedit totam facilis architecto. Voluptatem voluptates assumenda eligendi at.</p>
                    <div class="rating">
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="d-flex align-items-center mb-3"> 
                        <img src="images/users/tmp.jpg" loading="lazy" class="rounded-circle" width="30px">
                        <h6 class="m-0 ms-2">Jakaria</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dolorum sed impedit totam facilis architecto. Voluptatem voluptates assumenda eligendi at.</p>
                    <div class="rating">
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="d-flex align-items-center mb-3"> 
                        <img src="images/users/tmp.jpg" loading="lazy" class="rounded-circle" width="30px">
                        <h6 class="m-0 ms-2">Jakaria</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dolorum sed impedit totam facilis architecto. Voluptatem voluptates assumenda eligendi at.</p>
                    <div class="rating">
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="d-flex align-items-center mb-3"> 
                        <img src="images/users/tmp.jpg" loading="lazy" class="rounded-circle" width="30px">
                        <h6 class="m-0 ms-2">Jakaria</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dolorum sed impedit totam facilis architecto. Voluptatem voluptates assumenda eligendi at.</p>
                    <div class="rating">
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                        <i class='bi bi-star-fill text-warning'></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-5"> 
            <a href="about.php" class="btn btn-sm btn-outline-primary rounded-0 fw-bold shadow-none">Know More >>></a>
        </div>
    </div>
    <!-- /Testimonials -->

 
    <!-- Reach Us -->
    <h2 class="mt-5 pt-4 mb-4 text-center font-weight-bold h-font">OUR LOCATION</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe']; ?>"  loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4"> 
                <div class="bg-white p-4 rounded mb-4"> 
                    <h5>Call us</h5>
                    <a href="tel: +88<?php echo $contact_r['phn1']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+880<?php echo $contact_r['phn1']; ?>
                    </a><br>

                    <?php 
                        if($contact_r['phn2'] != 0){
                            echo<<<data
                            <a href="tel: +880$contact_r[phn2]" class="d-inline-block text-decoration-none text-dark">
                                <i class="bi bi-telephone-fill"></i> +880$contact_r[phn2]
                            </a>
                            data;
                        }
                    ?>
                    
                </div>

                <div class="bg-white p-4 rounded mb-4"> 
                    <h5>Follow us</h5>
                    <a href="<?php echo $contact_r['fb']; ?>" class="d-inline-block mb-2">
                        <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook me-1"></i>Facebook</span>
                    </a><br>
                    <?php 
                        if($contact_r["insta"] != ""){
                            echo<<<data
                            <a href="$contact_r[insta]" class="d-inline-block mb-2">
                                <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i>Instagram</span>
                            </a><br>
                            data;
                        }
                        if($contact_r["tw"] != ""){
                            echo<<<data
                            <a href="$contact_r[tw]" class="d-inline-block mb-2">
                                <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-twitter me-1"></i>Twitter</span>
                            </a>
                            data;
                        }

                    ?>
    
                </div>
            </div>
        </div>
    </div>
    <!-- /Reach Us -->
    
    <!-- Recovery Password modal start -->
    <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="recovery-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-shield-lock text-primary fs-3 me-2"></i>Set Up New Password</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Recovery alert show here -->
                        <div id="rec-alert"></div>

                        <div class="mb-4">
                            <label class="form-label">New Password</label>
                            <input type="password" name="pass" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="cpass" class="form-control shadow-none" required>
                        </div>
                        <input type="hidden" name="email">
                        <input type="hidden" name="token">
                        <div class="mb-2 text-end">
                            <button type="button" class="btn text-secondary shadow-none me-2" data-bs-dismiss="modal">CANCEL</button>
                            <button id="rec-btn" type="submit" class="btn btn-primary shadow-none">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Recovery Password modal end -->

    <!-- Footer -->
    <?php require("inc/footer.php"); ?>

    <!-- Recovery modal show -->
    <?php 
        if(isset($_GET["account_recovery"])){
            $f_data = filteration($_GET);
            $t_date = date("Y-m-d");

            $s_query = crud("select", "SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `token_exp`=? LIMIT 1", [$f_data["email"], $f_data["token"], $t_date], "sss");

            if($s_query->num_rows == 1){
                echo<<<showModal
                <script>
                    var myModal = document.getElementById("recoveryModal");

                    myModal.querySelector("input[name='email']").value = '$f_data[email]';
                    myModal.querySelector("input[name='token']").value = '$f_data[token]';

                    var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                    modal.show();
                </script>
                showModal;
            }else{
                echo<<<showAlert
                <script>
                    alert("Invalid or Expired Link!");
                </script>
                showAlert;
            }
        }
    ?>

    
    <!-- Swiper Js bundle -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        //Header swipper 
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }
        });

        //Testimonial swipper
        var swiper = new Swiper(".swiper-testimonials",{
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
            },
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
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });

        //For update password
        let recovery_form = document.getElementById("recovery-form");
        recovery_form.addEventListener("submit", (e) =>{
            e.preventDefault();
            showLoader("rec-btn");
            let data = new FormData();

            data.append("email", recovery_form.elements["email"].value);
            data.append("token", recovery_form.elements["token"].value);
            data.append("pass", recovery_form.elements["pass"].value);
            data.append("cpass", recovery_form.elements["cpass"].value);
            data.append("recover_pass", "");

            //Modal hide
            var myModal = document.getElementById("recoveryModal");
            var modal = bootstrap.Modal.getInstance(myModal);

            //For ajax
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);
            
            xhr.onload = function(){
                hideLoader("rec-btn", "SUBMIT");
                if(this.responseText == "pass_mismatch"){
                    customAlert("Password does not match!", "rec-alert");
                }else if(this.responseText == "failed"){
                    customAlert("Account reset failed!", "rec-alert");
                }else{
                    modal.hide();
                    alert("Account Reset Successful!");
                    recovery_form.reset();
                }
            }
            xhr.send(data);
        });

        //For comment section
    let comment_form = document.getElementById("comment-form");
    comment_form.addEventListener("submit", (e) =>{
        e.preventDefault();

        let data = new FormData();

        data.append("v_id", comment_form.elements["v_id"].value);
        data.append("u_id", comment_form.elements["u_id"].value);
        data.append("comment", comment_form.elements["comment"].value);
        data.append("add_comment", "");

        
        //For Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
        
        xhr.onload = function(){
            comment_form.reset();
            get_comment();
        }
        xhr.send(data);
    });

    //For get comment
    function get_comment(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onload = function(){
            document.getElementById("comment-data").innerHTML = this.responseText;     
        }

        xhr.send("get_comment");
    }

    
    //For load windo and call get_user function
    window.onload = function(){
        get_comment();
    }
    
    </script>


</body>
</html>