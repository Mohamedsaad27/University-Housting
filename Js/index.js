var hamburger = document.querySelector(".hamburger");
hamburger.addEventListener("click", function () {
    document.querySelector("body").classList.toggle("active");
})

let subMenu = document.getElementById("subMenu")
function toggleMenu() {
    subMenu.classList.toggle("open-menu");
}

//Update Function
$(document).ready(function () {                
    $('#UpdateFRM').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: '../app/requests/UpdateAdminData.php',
            method: 'POST',
            data: formData,
            success: function (response) {      
                response = JSON.parse(response);                
                if (response.res == "invalid") {
                    alert("Error");
                }
                else if (response.res == "success") {
                    alert("تم التعديل");
                    window.location.href = window.location.href;
                }
                else
                    alert("مش عارف");
            },
            error: function (xhr, status, error) {                       
                alert('Your form was not sent successfully.');
                console.error(error);
            }
        });
    });
});

//Update Password Function
$(document).ready(function () {                
    $('#UpdatePasswordFRM').submit(function (event) {
        event.preventDefault();
        // alert("test");
        var formData = $(this).serialize();
        $.ajax({
            url: '../app/requests/UpdatePassword.php',
            method: 'POST',
            data: formData,
            success: function (response) {      
                response = JSON.parse(response);                
                if (response.res == "invalid") {
                    window.location.href = window.location.href;
                }
                else if (response.res == "success") {
                    alert("تم التعديل");
                    window.location.href = window.location.href;
                }
                else if (response.res == "invalidd")
                    alert("مش عارف");
            },
            error: function (xhr, status, error) {                       
                alert('Your form was not sent successfully.');
                console.error(error);
            }
        });
    });
});