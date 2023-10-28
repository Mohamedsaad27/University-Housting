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

//New Room Function
$(document).ready(function () {                
    $('#NewRoomFRM').submit(function (event) {
        event.preventDefault();
        // alert("test");
        var formData = $(this).serialize();
        $.ajax({
            url: '../app/requests/newRoom.php',
            method: 'POST',
            data: formData,
            success: function (response) {      
                response = JSON.parse(response);                
                if (response.res == "invalid") {
                    window.location.href = window.location.href;
                }
                else if (response.res == "success") {
                    alert("تم الاضافة");
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
//get room detalis
document.getElementById("roomNumber").addEventListener("change", function () {
    // Get the selected option
    var selectedOption = this.value;
    // alert("test");
    $.ajax({
        url: 'app/requests/getRoom.php',
        method: 'POST',
        data: { roomNumber: selectedOption },
        success: function (response) {
            response = JSON.parse(response);
            document.getElementById("price").value = response[0].Price;
            document.getElementById("NumberOfBeds").value = response[0].NumberOfBeds;
        },
        error: function (xhr, status, error) {
            alert('Your form was not sent successfully.');
            console.error(error);
        }
    });
});


// Wait for the document to load
document.addEventListener('DOMContentLoaded', function() {
    // Get the duration select element
    var durationSelect = document.getElementById('duration');

    // Add change event listener
    durationSelect.addEventListener('change', function() {
        // Get the selected duration value
        var selectedDuration = parseFloat(this.value); // Convert to a number

        // Get the price value
        var price = parseFloat(document.getElementById('price').value); // Convert to a number

        // Calculate total price
        var totalPrice = selectedDuration * price;

        // Display the total price in the totalPrice input field
        document.getElementById('totalPrice').value = isNaN(totalPrice) ? '' : totalPrice;
    });
});


//New Booking Function
$(document).ready(function () {                
    $('#newBookingFRM').submit(function (event) {
        event.preventDefault();
        // alert("test"); 
        var formData = $(this).serialize();
        $.ajax({
            url: 'app/requests/addBooking.php',
            method: 'POST',
            data: formData,
            success: function (response) {      
                response = JSON.parse(response);                
                if (response.res == "invalid") {
                    window.location.href = window.location.href;
                }
                else if (response.res == "success") {
                    alert("تم الحجز بنجاح");
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