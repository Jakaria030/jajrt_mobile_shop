<?php 

    //Front end access process data
    define("SITE_URL", "http://127.0.0.1/jajrt_mobile_shop/");
    define("ABOUT_IMG_PATH", SITE_URL."images/about/");
    define("CAROUSEL_IMG_PATH", SITE_URL."images/carousel/");
    define("MOBILE_IMG_PATH", SITE_URL."images/mobile/");
    define("USERS_IMG_PATH", SITE_URL."images/users/");

    //Backend upload process needs data
    define("UPLOAD_IMAGE_PATH", $_SERVER["DOCUMENT_ROOT"]."/jajrt_mobile_shop/images/");
    define("ABOUT_FOLDER","about/");
    define("CAROUSEL_FOLDER","carousel/");
    define("MOBILE_FOLDER","mobile/");
    define("USERS_FOLDER","users/");


    // Alert success or danger
    function customAlert($type, $msg){
        $bs_class = ($type == 'success') ? "alert-success" : "alert-danger";
        echo<<<alert
            <div class="alert {$bs_class} alert-dismissible fade show custom-alert" role="alert">
                <strong class="me-3">{$msg}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
            setTimeout(function(){
                document.querySelector('.custom-alert').remove();
            }, 2000);
        </script>
        alert;
    }

    //Admin login
    function adminLogin(){
        session_start();
        if(!(isset($_SESSION["adminLogin"]))){
            redirect("index.php");
            exit;
        }
    }

    //Redirect
    function redirect($url){
        echo "<script>
                window.location.href='$url';
            </script>";
        exit;
    }
    
    //Upload image
    function uploadImage($image, $folder){
        $valid_mime = ["image/jpeg", "image/png", "image/webp"];
        $img_mime = $image["type"];

        if(!in_array($img_mime, $valid_mime)){
            return "inv_img"; //invalid image or formate
        }else if($image["size"]/(1024*1024) > 2){
            return "inv_size"; //invalid size greater 2 mb;
        }else{
            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
            $rname = "IMG_".random_int(11111, 99999).".$ext";
            $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
            
            if(move_uploaded_file($image["tmp_name"],$img_path)){
                return $rname;
            }else{
                return "upd_failed";
            }
        }
    }

    //Delete image
    function deleteImage($image, $folder){
        if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
            return true;
        }else{
            return false;
        }
    }

    //Upload svg icon
    function uploadsvgImage($image, $folder){
        $valid_mime = ["image/svg+xml"];
        $img_mime = $image["type"];

        if(!in_array($img_mime, $valid_mime)){
            return "inv_img"; //invalid image or formate
        }else if($image["size"]/(1024*1024) > 1){
            return "inv_size"; //invalid size greater 1 mb;
        }else{
            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
            $rname = "IMG_".random_int(11111, 99999).".$ext";
            $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
            
            if(move_uploaded_file($image["tmp_name"],$img_path)){
                return $rname;
            }else{
                return "upd_failed";
            }
        }
    }

    //Upload user image
    function uploadUserImage($image){
        $valid_mime = ["image/jpeg", "image/png", "image/webp"];
        $img_mime = $image["type"];

        if(!in_array($img_mime, $valid_mime)){
            return "inv_img"; //invalid image or formate
        }else{
            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
            $rname = "IMG_".random_int(11111, 99999).".jpeg";
            $img_path = UPLOAD_IMAGE_PATH.USERS_FOLDER.$rname;
            
            if($ext == "png" || $ext == "PNG"){
                $img = imagecreatefrompng($image["tmp_name"]);
            }else if($ext == "webp" || $ext == "WEBP"){
                $img = imagecreatefromwebp($image["tmp_name"]);
            }else{
                $img = imagecreatefromjpeg($image["tmp_name"]);
            }

            //Upload here with image resulation 75%
            if(imagejpeg($img, $img_path, 75)){
                return $rname;
            }else{
                return "upd_failed";
            }
        }
    }
    
?>