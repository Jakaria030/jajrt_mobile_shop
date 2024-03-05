<!-- Bootstrap Js bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>

    //Navigation item active
    function setActive() {
        let navbar = document.getElementById("dashboard-menu");
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

    //Alert
    function customAlert(type, msg, position="body"){
        let bs_class = (type == "success") ? "alert-success" : "alert-danger";
        let element = document.createElement("div");
        element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
                <strong class="me-3">${msg}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;
        if(position == "body"){
            document.body.append(element);
            element.classList.add("custom-alert");
        }else{
            document.getElementById(position).append(element);
        }
        setTimeout(remAlert, 2000);
    }
    
    //Remove alert after 2s
    function remAlert(){
        document.getElementsByClassName("alert")[0].remove();
    }

    
    setActive();
</script>