
function change() {
    var cabtype = document.getElementById('cabtype').value;
    if (cabtype == "CedMicro") {

        document.getElementById('luggage').readOnly = true;
        document.getElementById('luggage').innerHTML = " ";
    }
    else {
        document.getElementById('luggage').readOnly = false;
        document.getElementById('luggage').innerHTML = " ";
    }

}

function myfare() {
    var drop = document.getElementById('drop').value;
    var pickup = document.getElementById('pickup').value;
    var cabtype = document.getElementById('cabtype').value;
    var luggage = document.getElementById('luggage').value;

    if (pickup == "" || drop == "" || cabtype == "") {
        document.getElementById('dist').innerHTML = "All fields are required";
    }

    else if (pickup == drop) {
        document.getElementById('dist').innerHTML = "Pickup and drop location can not be same";
    }
    else {
        $.ajax(
            {
                url: 'fare.php',
                type: 'POST',
                data: {
                    pickup: pickup, drop: drop, cabtype: cabtype, luggage: luggage

                },
                success: function (data) {
                    console.log(data);
                    console.log("jfb"); $("#dist").html(data);
                }
            });
    }

}



