/**
 * Created by Marejean on 8/20/16.
 */

$(document).ready(function() {
    displayLogs();

    $("#btnRegisterAdmin").click(function() {
        var type = $("#type").val();
        var address = $("#address").val();
        var name = $("#name").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        var telephoneNumber = $("#telephoneNumber").val();
        var mobileNumber = $("#mobileNumber").val();

        if(type != "") {
            if(password == confirmPassword) {
                if(mobileNumber.length != 10) {
                    // Anjo, tell the user here that he/she must enter the exact 10 digits number
                } else {
                    mobileNumber = parseFloat(mobileNumber);
                    if(Number(mobileNumber) === mobileNumber) {
                        $.ajax({
                            type: "POST",
                            url: "php/objects/addAdmin.php",
                            data: {"type": type, "address": address, "name": name, "username": username, "password": password, "telephoneNumber": telephoneNumber, "mobileNumber": mobileNumber},
                            success: function(data) {
                                console.log("in adding admin = " + data);
                            },
                            error: function(data) {
                                console.log(JSON.stringify(data));
                            }
                        });
                    } else {
                        //--- here, tell the user that she/he must input integers no alphabet or special char
                        console.log("Registration not processed invalid mobile.");
                    }
                }
            } else {
                // password didn't match so do something here to notify the user
                console.log("Password didn't match");
            }
        } else {
            console.log("Hey, please choose type of organisation.   ")
        }
    });

    $("#btnLogInAdmin").click(function() {
        loginAdmin();
    });
});



function loginAdmin() {
    var username = $("#usernameEntered").val();
    var password = $("#passwordEntered").val();

    $.ajax({
        type: "POST",
        url: "php/objects/loginAdmin.php",
        data: {"username": username, "password": password},
        success: function(data) {
            if(data == "valid") {
                window.location.assign("admin.php");
            } else {
                //--- Anjo, the admin entered an invalid username or password; please do something here to notify them
                console.log("the user entered an invalid account info");
            }
        }
    });
}

function displayLogs() {
    $.ajax({
        type: "POST",
        url: "php/objects/displayLogs.php",
        success: function(data) {
            if(data == "") {
                $("#tblLogsContainer").html("No logs yet.");
            } else {
                $("#tblLogsContainer").html(data);
            }
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function displayFullLog(logId) {
    console.log("This function is called.");
    $.ajax({
        type: "POST",
        url: "php/objects/displayFullLog.php",
        data: {"logId": logId},
        success: function(data) {
            console.log("success displaying " + data);
            // then Anjo show the fullLoContainerDiv here maybe through modal dialog or what
            var logData = JSON.parse(data);
            $("#senderPhoneNumber").html(logData.senderPhoneNumber);
            //$("#senderAddress").html(logData.senderAddress);
            $("#senderMessage").html(logData.senderMessage);
            console.log("data = " + data + " logdata = " + logData);
            displayLogs();
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}
