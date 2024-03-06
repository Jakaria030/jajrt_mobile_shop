
//Get users
function get_or_search_user(srcKey=""){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        document.getElementById("users-data").innerHTML = this.responseText;     
    }

    xhr.send("get_or_search_user&searchKey="+srcKey);
}

//Toggle status
function toggle_status(id, val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        if(this.responseText == 1){
            customAlert("success", "Status toggleed!");
            get_or_search_user();
        }else{
            customAlert("error", "Server down!");
        }
    }

    xhr.send("toggle_status&id="+id+"&value="+val);
}

//Remove user
function remove_user(id){
    if(confirm("Are you sure, you want to delete this user?")){
        let data = new FormData();

        data.append("id",id);
        data.append("remove_user", "");
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/users.php", true);

        xhr.onload = function(){
            if(this.responseText == 1){
                customAlert("success", "User removed!");
                get_or_search_user();
            }else{
                customAlert("error", "User removal failed!");
            }   
        }
        xhr.send(data);
    }
}

//For load windo and call get_user function
window.onload = function(){
    get_or_search_user();
}
