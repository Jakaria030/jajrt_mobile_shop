let general_data, contacts_data;

let general_s_form = document.getElementById("general_s_form");
let contacts_s_form = document.getElementById("contacts_s_form");
let team_s_form = document.getElementById("team_s_form");


//Get site title, about & shutdown
function get_general(){
    let site_title = document.getElementById("site_title");
    let site_about = document.getElementById("site_about");
    let site_title_inp = document.getElementById("site_title_inp");
    let site_about_inp = document.getElementById("site_about_inp");
    let shutdown_toggle = document.getElementById("shutdown-toggle");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        general_data = JSON.parse(this.responseText);

        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;

        if(general_data.shutdown == 0){
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
        }else{
            shutdown_toggle.checked = true;
            shutdown_toggle.value = 1;
        }
    }

    xhr.send("get_general");
}

//Update site titile & about
general_s_form.addEventListener("submit", function(e){
    e.preventDefault();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   
    var myModal = document.getElementById("general-s");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();
    
    xhr.onload = function(){
        if(this.responseText == 1){
            customAlert("success", "Changes saved!");
            get_general();
        }else{
            customAlert("error", "No Changes made!");
        }
    }

    xhr.send("upd_general&site_title="+site_title_inp.value+"&site_about="+site_about_inp.value);
});

//Update shutdown
function upd_shutdown(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        if(this.responseText == 1 && general_data.shutdown == 0){
            customAlert("success", "Site has been shutdown!");
        }else{
            customAlert("success", "Shutdown mode off!");
        }
        get_general();
    }
    xhr.send("upd_shutdown="+val);
}

//Get contact details
function get_contacts(){
    let contacts_p_id = ["address", "gmap", "phn1", "phn2", "email", "fb", "insta", "tw"];
    let iframe = document.getElementById("iframe");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);
        
        for(i = 0; i < contacts_p_id.length; i++){
            document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
        }
        iframe.src = contacts_data[9];
        contacts_inp(contacts_data);
    }

    xhr.send("get_contacts");
}

//Keep value in Edit form
function contacts_inp(data){
    let contacts_inp_id = ["address_inp", "gmap_inp", "phn1_inp", "phn2_inp", "email_inp", "fb_inp", "insta_inp", "tw_inp", "iframe_inp"];
    
    for(i = 0; i < contacts_inp_id.length; i++){
        document.getElementById(contacts_inp_id[i]).value = data[i+1];
    }
}

//Update contacts details
contacts_s_form.addEventListener("submit", function(e){
    e.preventDefault();
    let index = ["address", "gmap", "phn1", "phn2", "email", "fb", "insta", "tw", "iframe"];
    let contacts_inp_id = ["address_inp", "gmap_inp", "phn1_inp", "phn2_inp", "email_inp", "fb_inp", "insta_inp", "tw_inp", "iframe_inp"];

    let data_str="";
    for(i = 0; i < index.length; i++){
        data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + "&";
    }
    data_str += "upd_contacts";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var myModal = document.getElementById("contacts-s");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    xhr.onload = function(){
        if(this.responseText == 1){
            customAlert("success", "Changes saved!");
            get_contacts();
        }else{
            customAlert("error", "No Changes made!");
        }
    }

    xhr.send(data_str);
})

//Add member in team_details table
team_s_form.addEventListener("submit", function(e){
    e.preventDefault();
    let member_name_inp = document.getElementById("member_name_inp");
    let member_picture_inp = document.getElementById("member_picture_inp");

    let data = new FormData();
    data.append("name", member_name_inp.value);
    data.append("picture", member_picture_inp.files[0]);
    data.append("add_member", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings.php", true);
    
    var myModal = document.getElementById("team-s");
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
            customAlert("success", "New member added!");
            member_name_inp.value="";
            member_picture_inp.value="";
            get_members();
        }
    }

    xhr.send(data);
})

//Get members from team details table
function get_members(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        document.getElementById("team-data").innerHTML = this.responseText;
    }

    xhr.send("get_members");
}

//Delete member from team details table
function rem_member(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        if(this.responseText == 1){
            customAlert("success", "Member removed!");
            get_members();
        }else{
            customAlert("error", "Server connection failed!");
        }
    }

    xhr.send("rem_member&sr_no="+val);
}

//Load window
window.onload = function(){
    get_general();
    get_contacts();
    get_members();
}