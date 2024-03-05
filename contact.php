<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
    <title>JAJRT Mobile Shop - Contact</title>
</head>
<body class="bg-light">
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>
    
    <!-- Contact us start -->
    <div class="my-5 px-4"> 
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
        Quia at aperiam, nihil eaque nobis deleniti illo. Placeat dicta hic pariatur.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4"> 
                <div class="bg-white rounded shadow p-4"> 
                    <iframe class="w-100 rounded mb-4" height="320px" src="https://shorturl.at/lyzH8"  loading="lazy"></iframe>

                    <h5>Address</h5>
                    <a href="https://shorturl.at/lyzH8" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> XYZ, Gopalganj.
                    </a>

                    <h5 class="mt-4">Call us</h5>
                    <a href="tel: +8801725490784" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +8801725490784
                    </a><br>
    
                    <a href="tel: +8801726267799" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +8801726267799
                    </a>
        

                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: admin@gmail.com" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-envelope-fill"></i> admin@gmail.com</a>

                    <h5 class="mt-4">Follow us</h5>
                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
    
                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-instagram me-1"></i>
                    </a>    

                    <a href="#" class="d-inline-block text-dark fs-5">
                        <i class="bi bi-twitter me-1"></i>
                    </a>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4"> 
                <div class="bg-white rounded shadow p-4"> 
                    <form method="POST">
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input name="name" type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input name="subject" type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name="message" class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button name="send" type="submit" class="btn btn-primary mt-3">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Contact us end -->

    <!-- Footer -->
    <?php require("inc/footer.php"); ?>

</body>
</html>