
<!-- Top header start -->
<div class="container-fluid" style="background: var(--c_color2)"> 
    <div class="container p-2">
        <div class="d-flex justify-content-between align-items-center p-1"> 
            <div>
                <a href="admin/index.php" class="text-decoration-none text-dark">Admin Login</a>
            </div>
            <div class="">
                <input type="text" class="form-control shadow-none" placeholder="Type to search...">
            </div>
            <div class="cart">
                <div class="d-flex align-items-center">
                    <span class="fs-6">Total: $500</span>
                    <div class="dropdown">
                        <a class="btn dropdown-toggle shadow-none .dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-cart-plus-fill fs-3"></i>
                        </a>

                        <ul style="z-index:99999;" class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /Top header end -->

<!-- Navbar -->
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-dark bg-primary px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3" href="index.php"><?php echo $settings_r["site_title"]; ?></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-2"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item me-2"><a class="nav-link" href="mobile.php">Mobile</a></li>
                <li class="nav-item me-2"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
            </ul>
            
            <div class="d-flex">
                <!-- Button trigger modal when logged in then show-->
                
                <?php 
                    if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
                        $path = USERS_IMG_PATH;
                        
                        echo<<<data
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-light shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <img src="$path$_SESSION[uPic]" style="width: 25px; height: 25px;" class="me-1 rounded-circle"/>    
                                $_SESSION[uName]
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="order.php">Order</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        data;
                    }else{
                        echo<<<data
                        <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                        <button type="button" class="btn btn-outline-light shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                        data;
                    }
                ?>
    
            </div>
        </div>
    </div>
</nav>


<!-- Register modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-lines-fill text-primary fs-3 me-2"></i>User Registration</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <!-- Registration alert show here -->
                        <div id="reg-alert"></div>
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3"> 
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3"> 
                                <label class="form-label">Phone Number</label>
                                <input name="phonenum" type="number" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Picture</label>
                                <input name="profile" type="file" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-12 p-0 mb-3"> 
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3"> 
                                <label class="form-label">Confirm Password</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                            </div>
                        </div>
                    </div>

                    <div class="text-center my-1"> 
                        <button id="reg-btn" type="submit" class="btn btn-primary shadow-none">REGISTER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- User login modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle text-primary fs-3 me-2"></i>User Login</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Login alert show here -->
                    <div id="login-alert"></div>
                    <div class="mb-3">
                        <label class="form-label">Email/Mobile</label>
                        <input type="text" name="email_mob" class="form-control shadow-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control shadow-none" required>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button id="login-btn" type="submit" class="btn btn-primary shadow-none">LOGIN</button>
                        <button type="button" class="btn text-secondary shadow-none p-0" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#forgotModal" >Forgot Password?</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Forgot password modal-->
<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="forgot-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle text-primary fs-3 me-2"></i>Forgot Password</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Forgot alert show here -->
                    <div id="forgot-alert"></div>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Note: A link will be sent to your email to reset your password!</span>
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control shadow-none" required>
                    </div>
                    <div class="mb-2 text-end">
                        <button type="button" class="btn text-secondary shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#loginModal" >CANCEL</button>
                        <button id="forgot-btn" type="submit" class="btn btn-primary shadow-none">SEND LINK</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Navbar -->