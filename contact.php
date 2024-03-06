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
                    <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact_r['iframe']; ?>"  loading="lazy"></iframe>

                    <h5>Address</h5>
                    <a href="<?php echo $contact_r['gmap']; ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address']; ?>
                    </a>

                    <h5 class="mt-4">Call us</h5>
                    <a href="tel: +880<?php echo $contact_r['phn1']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +880<?php echo $contact_r['phn1']; ?>
                    </a><br>
    
                    <?php 
                        if($contact_r["phn2"] != 0){
                            echo<<<data
                            <a href="tel: +880$contact_r[phn2]" class="d-inline-block text-decoration-none text-dark">
                                <i class="bi bi-telephone-fill"></i>+880$contact_r[phn2]
                            </a>
                            data;
                        }
                    ?>
        

                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: <?php echo $contact_r['email']; ?>" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email']; ?></a>

                    <h5 class="mt-4">Follow us</h5>
                    <a href="<?php echo $contact_r['fb']; ?>" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
                    
                    <?php 
                        if($contact_r["insta"] != ""){
                            echo<<<data
                            <a href="$contact_r[insta]" class="d-inline-block text-dark fs-5 me-2">
                                <i class="bi bi-instagram me-1"></i>
                            </a>
                            data;
                        }
                        if($contact_r["tw"] != ""){
                            echo<<<data
                            <a href="$contact_r[tw]" class="d-inline-block text-dark fs-5">
                                <i class="bi bi-twitter me-1"></i>
                            </a>
                            data;
                        }
                    ?>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4"> 
                <div class="bg-white rounded shadow p-4"> 
                    <form method="POST">
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input name="name" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" type="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input name="subject" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name="message" class="form-control shadow-none" rows="5" style="resize: none;" required></textarea>
                        </div>
                        <button name="send" type="submit" class="btn btn-primary mt-3">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Contact us end -->

    <!-- Insert user queries -->
    <?php 
        if(isset($_POST["send"])){
            $f_data = filteration($_POST);

            $query = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
            $values = [$f_data["name"], $f_data["email"], $f_data["subject"], $f_data["message"]];
            $dtypes = "ssss";

            $msg="";
            if(crud("insert", $query, $values, $dtypes)){
                $msg .= "Mail sent!";
            }else{
                $msg .= "Server down!";
            }

            echo<<<alrt
            <script>
                alert("$msg");
            </script>
            alrt;
        }
    ?>

    <!-- Footer -->
    <?php require("inc/footer.php"); ?>

</body>
</html>