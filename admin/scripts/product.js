
//for submit product details
let product_s_form = document.getElementById("product_s_form");

product_s_form.addEventListener("submit", function(e){
    e.preventDefault();

    let data = new FormData();
    data.append("mobile_name", product_s_form.elements["mobile_name"].value);
    data.append("b_model", product_s_form.elements["b_model"].value);
    data.append("b_quantity", product_s_form.elements["b_quantity"].value);
    data.append("b_price", product_s_form.elements["b_price"].value);
    data.append("b_profile", product_s_form.elements["b_profile"].files[0]);
    data.append("small_description", product_s_form.elements["small_description"].value);
    data.append("description", product_s_form.elements["description"].value);
    data.append("warranty", product_s_form.elements["warranty"].value);
    data.append("p_build", product_s_form.elements["p_build"].value);
    data.append("p_weight", product_s_form.elements["p_weight"].value);
    data.append("p_dimensions", product_s_form.elements["p_dimensions"].value);
    data.append("n_sim", product_s_form.elements["n_sim"].value);
    data.append("n_speed", product_s_form.elements["n_speed"].value);
    data.append("n_2g_bands", product_s_form.elements["n_2g_bands"].value);
    data.append("n_3g_bands", product_s_form.elements["n_3g_bands"].value);
    data.append("n_4g_bands", product_s_form.elements["n_4g_bands"].value);
    data.append("n_5g_bands", product_s_form.elements["n_5g_bands"].value);
    data.append("d_size", product_s_form.elements["d_size"].value);
    data.append("d_type", product_s_form.elements["d_type"].value);
    data.append("d_resolution", product_s_form.elements["d_resolution"].value);
    data.append("p_cpu", product_s_form.elements["p_cpu"].value);
    data.append("p_gpu", product_s_form.elements["p_gpu"].value);
    data.append("p_chipset", product_s_form.elements["p_chipset"].value);
    data.append("m_internal", product_s_form.elements["m_internal"].value);
    data.append("m_card_slot", product_s_form.elements["m_card_slot"].value);
    data.append("m_video", product_s_form.elements["m_video"].value);
    data.append("m_triple", product_s_form.elements["m_triple"].value);
    data.append("m_features", product_s_form.elements["m_features"].value);
    data.append("s_video", product_s_form.elements["s_video"].value);
    data.append("s_single", product_s_form.elements["s_single"].value);
    data.append("s_features", product_s_form.elements["s_features"].value);
    data.append("o_os", product_s_form.elements["o_os"].value);
    data.append("c_nfc", product_s_form.elements["c_nfc"].value);
    data.append("c_usb", product_s_form.elements["c_usb"].value);
    data.append("c_radio", product_s_form.elements["c_radio"].value);
    data.append("c_wifi", product_s_form.elements["c_wifi"].value);
    data.append("c_bluetooth", product_s_form.elements["c_bluetooth"].value);
    data.append("c_jack", product_s_form.elements["c_jack"].value);
    data.append("f_sensors", product_s_form.elements["f_sensors"].value);
    data.append("b_type", product_s_form.elements["b_type"].value);
    data.append("b_charging", product_s_form.elements["b_charging"].value);
    data.append("t_performance", product_s_form.elements["t_performance"].value);
    data.append("add_product", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/product.php", true);
    

    xhr.onload = function(){
        if(this.responseText == 0){
            customAlert("error", "Insertion failed! Server Down.");
        }else{
            alert("Product is Added.");
            product_s_form.reset();
            window.location.href = "mobile.php";
        }
    }

    xhr.send(data);
});