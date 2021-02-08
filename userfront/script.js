
$(document).ready(function () {
    $("#pickup").change(function () {
        $("#drop option").prop('disabled', false);
        $('#drop option[value="' + $("#pickup").val() + '"]').prop('disabled', 'disabled');
    });
    $('#drop').change(function () {
        $('#pickup option').prop('disabled', false);
        $('#pickup option[value="' + $("#drop").val() + '"]').prop('disabled', 'disabled');
    });
});

function change() {
    var cabtype = document.getElementById('cabtype').value;
    if (cabtype == "CedMicro") {

        document.getElementById('luggage').readOnly = true;
        document.getElementById('luggage').style.visibility = "hidden";
        document.getElementById('luggage').innerHTML = "Weight is not allowed for CedMicro";
    }
    else {
        document.getElementById('luggage').readOnly = false;
        document.getElementById('luggage').style.visibility = "visible";

    }

}

function myfare() {
    var drop = document.getElementById('drop').value;
    var pickup = document.getElementById('pickup').value;
    var cabtype = document.getElementById('cabtype').value;
    var luggage = document.getElementById('luggage').value;
    console.log(drop);
    console.log(pickup);
    console.log(luggage);

    console.log(cabtype);

    if (pickup == "" || drop == "" || cabtype == "") {
        document.getElementById('luggage').style.visibility = "hidden";
        document.getElementById('dist').innerHTML = "All fields aren't filled correctly";

    }


    else {
        $.ajax(
            {
                url: 'fare.php',
                method: 'POST',
                data: {
                    pickup: pickup,
                    drop: drop,
                    cabtype: cabtype,
                    luggage: luggage
                },
                success: function (data) {
                    // console.log(data);
                    $("#dist").html(data);


                }
            });
    }

}



