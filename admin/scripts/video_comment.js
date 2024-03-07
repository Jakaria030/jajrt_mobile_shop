
//Video link add
let video_s_form = document.getElementById("video-s-form");
video_s_form.addEventListener("submit", function(e){
    e.preventDefault();

    let data = new FormData();
    data.append("_title", video_s_form.elements["_title"].value);
    data.append("link", video_s_form.elements["link"].value);
    data.append("add_video", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/video_comment.php", true);
    
    var myModal = document.getElementById("video-s");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    xhr.onload = function(){
        if(this.responseText == "ins_failed"){
            customAlert("error", "Video does not upload. Server Down!");
        }else{
            customAlert("success", "New video added!");
            video_s_form.elements["_title"].value = "";
            video_s_form.elements["link"].value = "";
            get_video();
        }
    }

    xhr.send(data);
})

//Get video from videos table
function get_video(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/video_comment.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        document.getElementById("video-data").innerHTML = this.responseText;
    }

    xhr.send("get_video");
}

//Toggle status
function toggle_status(id, val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/video_comment.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        if(this.responseText == 1){
            customAlert("success", "Status toggleed!");
            get_video();
        }else{
            customAlert("error", "Server down!");
        }
    }

    xhr.send("toggle_status&v_id="+id+"&value="+val);
}

//Remove video
function remove_video(id){
    if(confirm("Are you sure, you want to delete this user?")){
        let data = new FormData();

        data.append("v_id",id);
        data.append("remove_video", "");
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/video_comment.php", true);

        xhr.onload = function(){
            if(this.responseText == 1){
                customAlert("success", "Video removed!");
                get_video();
            }else{
                customAlert("error", "Video removal failed!");
            }   
        }
        xhr.send(data);
    }
}

//Load window
window.onload = function(){
    get_video();
}