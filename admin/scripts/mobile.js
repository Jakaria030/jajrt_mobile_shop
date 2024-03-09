
let category_s_form = document.getElementById("category_s_form");

//Add category in categories table
category_s_form.addEventListener("submit", function(e){
    e.preventDefault();
    let category_inp = document.getElementById("category_inp");
    let mobile_inp = document.getElementById("mobile_inp");

    let data = new FormData();
    data.append("category", category_s_form.elements["category"].value);
    data.append("mobile_name", category_s_form.elements["mobile_name"].value);
    data.append("add_category", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/mobile.php", true);
    
    var myModal = document.getElementById("category-s");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    xhr.onload = function(){
        if(this.responseText == 0){
            customAlert("error", "Insertion failed! Server Down.");
        }else{
            customAlert("success", "New Category added!");
            category_inp.value="";
            mobile_inp.value="";
            get_category();
        }
    }

    xhr.send(data);
});

//Get category from categories table
function get_category(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/mobile.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        document.getElementById("category-data").innerHTML = this.responseText;
    }

    xhr.send("get_category");
}

//Delete category from categories table
function rem_category(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/mobile.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        if(this.responseText == 1){
            customAlert("success", "Category removed!");
            get_category();
        }else{
            customAlert("error", "Category remove failed!");
        }
    }

    xhr.send("rem_category&c_id="+val);
}

//Get product data
function get_product(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/mobile.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        document.getElementById("product-data").innerHTML = this.responseText;
    }

    xhr.send("get_product");
}

//Delete product
function rem_product(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/mobile.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){
        if(this.responseText == 1){
            customAlert("success", "Product removed!");
            get_product();
        }else{
            customAlert("error", "Product remove failed!");
        }
    }

    xhr.send("rem_product&p_id="+val);
}
//Load window
window.onload = function(){
    get_category();
    get_product();
}