/**
 * Created by Marejean on 8/20/16.
 */

$(document).ready(function() {

    $("btnSubmitPhoneNumber").click(function() {
        var phoneNumber = $("#phoneNumber").val();
        phoneNumber = parseInt(phoneNumber);
        if(phoneNumber.length == 10 && Number(phoneNumber) === phoneNumber) {
            $.ajax({
                type: "POST",
                url: "php/addUser.php",
                data: {"phoneNumber": phoneNumber},
                success: function(data) {
                    // Anjo, tell the user that a verification code is being sent to her/his number. Notify the user
                    console.log("user's phone number's successfully saved. = " + data);
                },
                error: function(data) {
                    console.log(JSON.stringify(data));
                }
            });
        } else {
            // Anjo, the user entered an invalid phone number; Please do something here to notify the user
            console.log("Invalid phone number entered");
        }
    });

    $("#btnRegisterAdmin").click(function() {
        var type = $("#type").val();
        var address = $("#address").val();
        var name = $("#name").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        var contactNumber = $("#contactNumber").val();

        if(password == confirmPassword) {
            $.ajax({
                type: "POST",
                url: "php/objects/addAdmin.php",
                data: {"type": type, "address": address, "name": name, "username": username, "password": password, "contactNumber": contactNumber},
                success: function(data) {
                    console.log("in adding admin = " + data);
                },
                error: function(data) {
                    console.log(JSON.stringify(data));
                }
            });
        } else {
            // password didn't match so do something here to notify the user
            console.log("Password didn't match");
        }
    });
});

function displayLogs() {
    $.ajax({
        type: "POST",
        url: "php/objects/displayLogs.php",
        success: function(data) {
            $("#logsContainerDiv").html(data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function displayFullLog(logId) {
    $.ajax({
        type: "POST",
        url: "php/objects/displayFullLog.php",
        data: {"logId": logId},
        success: function(data) {
            $("#fullLoContainerDiv").html(data);
            // then Anjo show the fullLoContainerDiv here maybe through modal dialog or what
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}