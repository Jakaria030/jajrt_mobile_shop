
let carousel_s_form = document.getElementById("carousel_s_form");

//Add image in carousel table
carousel_s_form.addEventListener("submit", function(e){
    e.preventDefault();
    let carousel_picture_inp = document.getElementById("carousel_picture_inp");

    let data = new FormData();
    data.append("picture", carousel_picture_inp.files[0]);
    data.append("add_image", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel.php", true);
    
    var myModal = document.getElementById("carousel-s");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    xhr.onload = function(){
        if(this.responseText == "inv_img"){
            customAlert("error", "Only JPG and PNG images are allowed!");
        }else if(this.responseText == "inv_size"){
            customAlert("error", "Image should be less then 2MB!");
        }else if(this.responseText == "upd_failed"){
            customAlert("error", "Image upload failed.Server Down!");
        }else{
            customAlert("success", "New image added!");
            carousel_picture_inp.value="";
            get_carousel();
        }
    }

    xhr.send(data);
})

//Get carousel from carousel table
function get_carousel(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        document.getElementById("carousel-data").innerHTML = this.responseText;
    }

    xhr.send("get_carousel");
}

//Delete image from carousel table
function rem_image(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        if(this.responseText == 1){
            customAlert("success", "Image removed!");
            get_carousel();
        }else{
            customAlert("error", "Server remove failed!");
        }
    }

    xhr.send("rem_image&sr_no="+val);
}

//Load window
window.onload = function(){
    get_carousel();
}