
<!-- Footer -->
<div class="container-fluid bg-white mt-5"> 
    <div class="row">
        <div class="col-lg-4 p-4"> 
            <h3 class="fw-bold fs-3 mb-2"><?php echo $settings_r["site_title"]; ?></h3>
            <p><?php echo $settings_r["site_about"]; ?></p>
        </div>

        <div class="col-lg-4 p-3"> 
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
            <a href="mobile.php" class="d-inline-block mb-2 text-dark text-decoration-none">Mobile</a><br>
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact</a><br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
        </div>

        <div class="col-lg-4 p-4"> 
            <h5 class="mb-3">Follow us</h5>
            <a href="<?php echo $contact_r['fb']; ?>" class="d-inline-block text-dark text-decoration-none mb-2"><i class="bi bi-facebook me-1"></i>Facebook</a><br>
            
            <?php 
                if($contact_r["insta"] != ""){
                    echo<<<data
                    <a href="$contact_r[insta]" class="d-inline-block text-dark text-decoration-none mb-2"><i class="bi bi-instagram me-1"></i>Instagram</a><br>
                    data;
                }
                if($contact_r["tw"] != ""){
                    echo<<<data
                    <a href="$contact_r[tw]" class="d-inline-block text-dark text-decoration-none"><i class="bi bi-twitter me-1"></i>Twitter</a>
                    data;
                }
            ?>
        </div>
    </div>
</div>
<h6 class="text-center bg-secondary text-white p-3 m-0">&copy; JAJRT Mobile Shop 2023 - <?php echo date("Y"); ?> </h6>
<!-- /Footer -->

<!-- Bootstrap Js bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script> 
    //Navigation item active
    function setActive() {
        let navbar = document.getElementById("nav-bar");
        let a_tags = navbar.getElementsByTagName("a");

        let currentFileName = window.location.href.split("/").pop().split(".")[0];

        for(let i = 0; i < a_tags.length; i++){
            let file = a_tags[i].href.split("/").pop().split(".")[0];

            if(currentFileName === file){
                a_tags[i].classList.add("active");
            }else{
                a_tags[i].classList.remove("active");
            }
        }
    }

    //Alert success or danger
    function customAlert(msg, position="body"){
        let element = document.createElement("div");
        element.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="me-3">${msg}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;

        document.getElementById(position).append(element);
        setTimeout(remAlert, 2000);
    }
    //Remove alert after 2s
    function remAlert(){
        document.getElementsByClassName("alert")[0].remove();
    }

    //Loader show
    function showLoader(btnId) {
        var alert_button = document.getElementById(btnId);
        alert_button.disabled = true;
        alert_button.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait.`;
    }

    //Loader hide
    function hideLoader(btnId, btnName){
        var alert_button = document.getElementById(btnId);
        alert_button.disabled = false;
        alert_button.innerHTML = btnName;
    }

    //For registration
    let register_form = document.getElementById("register-form");
    register_form.addEventListener("submit", (e) =>{
        e.preventDefault();
        showLoader("reg-btn");

        let data = new FormData();

        data.append("name", register_form.elements["name"].value);
        data.append("phonenum", register_form.elements["phonenum"].value);
        data.append("email", register_form.elements["email"].value);
        data.append("address", register_form.elements["address"].value);
        data.append("pass", register_form.elements["pass"].value);
        data.append("cpass", register_form.elements["cpass"].value);
        data.append("profile", register_form.elements["profile"].files[0]);
        data.append("register", "");

        //For modal hide
        var myModal = document.getElementById("registerModal");
        var modal = bootstrap.Modal.getInstance(myModal);

        
        //For Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
        
        xhr.onload = function(){
            hideLoader("reg-btn", "REGISTER");
            if(this.responseText == "pass_mismatch"){
                customAlert("Password Mismatch!", "reg-alert");
            }else if(this.responseText == "email_already"){
                customAlert("Email already registered!", "reg-alert");
            }else if(this.responseText == "phone_already"){
                customAlert("Phone already registered!", "reg-alert");
            }else if(this.responseText == "inv_img"){
                customAlert("Only JPG, WEBP, PNG images are alowed!", "reg-alert");
            }else if(this.responseText == "upd_falied"){
                customAlert("Image upload failed!", "reg-alert");
            }else if(this.responseText == "mail_failed"){
                customAlert("Verification mail not send! Sever down.", "reg-alert");
            }else if(this.responseText == "ins_failed"){
                customAlert("Registration failed. Server down!", "reg-alert");
            }else{
                modal.hide();
                alert("Registration successful. Email Verification link sent to your email.");
                register_form.reset();
            }
        }
        xhr.send(data);
    });

    //For login
    let login_form = document.getElementById("login-form");
    login_form.addEventListener("submit", (e) =>{
        e.preventDefault();
        showLoader("login-btn");

        let data = new FormData();

        data.append("email_mob", login_form.elements["email_mob"].value);
        data.append("pass", login_form.elements["pass"].value);
        data.append("login", "");

        //Modal hide
        var myModal = document.getElementById("loginModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        

        //For ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
        
        xhr.onload = function(){
            hideLoader("login-btn", "LOGIN");
            if(this.responseText == "inv_email_mob"){
                customAlert("Invalid Email or Mobile Number!", "login-alert");
            }else if(this.responseText == "not_verified"){
                customAlert("Email is not verified!", "login-alert");
            }else if(this.responseText == "inactive"){
                customAlert("Account Suspended! Please contact Admin.", "login-alert");
            }else if(this.responseText == "invalid_pass"){
                customAlert("Incorrect Password!", "login-alert");
            }else{
                modal.hide();
                window.location = window.location.pathname;
            }
        }
        xhr.send(data);
    });
    
    //For forgot password
    let forgot_form = document.getElementById("forgot-form");
    forgot_form.addEventListener("submit", (e) =>{
        e.preventDefault();
        showLoader("forgot-btn");

        let data = new FormData();

        data.append("email", forgot_form.elements["email"].value);
        data.append("forgot_pass", "");

        //Modal hide
        var myModal = document.getElementById("forgotModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        
        //For ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
        
        xhr.onload = function(){
            hideLoader("forgot-btn", "SEND LINK");
            if(this.responseText == "inv_email"){
                customAlert("Invalid Email!", "forgot-alert");
            }else if(this.responseText == "not_verified"){
                customAlert("Email is not verified!", "forgot-alert");
            }else if(this.responseText == "inactive"){
                customAlert("Account Suspended! Please contact Admin.", "forgot-alert");
            }else if(this.responseText == "mail_failed"){
                customAlert("Cannot send email! Server down.", "forgot-alert");
            }else if(this.responseText == "upd_failed"){
                customAlert("Password Reset Failed!", "forgot-alert");
            }else{
                modal.hide();
                alert("Reset link sent to email.");
                forgot_form.reset();
            }
        }
        xhr.send(data);
    });

    function search_mobile(srcKey=""){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search_mobile.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onload = function(){
            document.getElementById("mobile-s-data").innerHTML = this.responseText;     
        }

        xhr.send("search_mobile&searchKey="+srcKey);
    }
    setActive();
    
</script>