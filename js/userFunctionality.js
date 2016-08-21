/**
 * Created by Marejean on 8/20/16.
 */

//var destLat = "";
//var destLng = "";
var specificMessage = "";
var currentLocationForTesting = "Gardner St., Pasig, Metro Manila, Philippines";
$(document).ready(function() {

    $("#btnLoginUser").click(function() {
        loginUser();
    });

    $("#btnSubmitVerificationCode").click(function() {
        checkVerificationCode();
    });

    $("#btnRegisterUser").click(function() {
        var phoneNumber = $("#phoneNumberToRegister").val();
        console.log(phoneNumber + " is entered.");
        if(phoneNumber.length == 10) {
            phoneNumber = parseInt(phoneNumber);
            if(Number(phoneNumber) === phoneNumber) {
                console.log(phoneNumber);
                phoneNumber = "63"+phoneNumber;
                $.ajax({
                    type: "POST",
                    url: "php/objects/addUser.php",
                    data: {"phoneNumber": phoneNumber},
                    success: function(data) {
                        if(data != "used") {
                            sendVerificationCode(phoneNumber, data)
                            console.log("user's phone number's successfully saved. = " + data);
                        } else {
                            console.log(" Number is already used = " + data);
                        }
                    },
                    error: function(data) {
                        console.log(JSON.stringify(data));
                    }
                });
            } else console.log("Please enter a valid phone number");
        } else {
            // Anjo, the user entered an invalid phone number; Please do something here to notify the user
            console.log("Invalid phone number entered");
        }
    });

    $("#btnSendSpecificMessage").click(function() {
        specificMessage = $("#specificMessage").val();
        var whereToSend = $("#whereToSend").val();

        if(whereToSend == "Police Station") {
            contactPolice();
        } else if(whereToSend == "Hospital") {
            contactHospital();
        } else if(whereToSend == "Fire Station") {
            contactFireMen();
        } else if(whereToSend == "Red Cross") {
            contactRedCross();
        } else {

        }


    })
});

function checkVerificationCode() {
    var verificationCodeEntered = $("#verificationCodeEntered").val();
    $.ajax({
        type: "POST",
        url: "php/objects/checkVerificationCode.php",
        data: {"verificationCodeEntered": verificationCodeEntered},
        success: function(data) {
            if(data == "valid") {
                console.log("vedified = " + data);
                window.location.assign("message.php");
            } else {
                // it means the user entered an invalid verification code, please notify them Anjo
                console.log("checking verification code " + data);
            }
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function getNearestRespondent(dataByType) {
    var dataArray = JSON.parse(dataByType);
    var nearestAdminId = "";
    //var nearestDistance = 0;
    var userLocationArray = currentLocationForTesting.split(" ");
    console.log(JSON.stringify(userLocationArray) + " = this");
    var userCountry = userLocationArray[userLocationArray.length-1];
    var userCity = userLocationArray[userLocationArray.length-2];
        console.log("User city = " + userCity);
        userCity = userCity.substr(0, userCity.length-1);
    if(dataArray.length <= 0) {
        //---- Anjo tell the user here that their is no near or even a record of respondent he/she's requesting
    } else {
        for(var i = 0; i < dataArray.length; i++) {
            console.log("dataArray = " + JSON.stringify(dataArray[i]));
            var jsonData = dataArray[i];
            var jsDataArray = jsonData.address.split(" ");
            console.log(jsDataArray);
            var country = jsDataArray[jsDataArray.length-1];
            console.log("country: " + country);
            var cIndex = jsonData.address.indexOf(country);
            var address = jsonData.address.substring(0, cIndex-2);
            var adminCity = jsDataArray[jsDataArray.length-2];
                adminCity = adminCity.substr(0, adminCity.length-1);
            console.log("city: " + adminCity);
            if(i == 0) {
                nearestAdminId = jsonData.adminId;
            } else if(userCity.toLowerCase() == adminCity.toLowerCase()) {
                nearestAdminId = jsonData.adminId;
            }
        }
        addLog(nearestAdminId);
    }
}

function contactPolice() {
    $.ajax({
        type: "POST",
        url: "php/objects/contactPolice.php",
        success: function(data) {
            // --- a police station was successfully reached
            console.log("a police station was successfully reached = " + data);
            // data is JSON array
            getNearestRespondent(data);
        },
        error: function(data) {
            console.log(JSON.stringify(data))
        }
    });
}

function addLog(adminId) {
    var message = $("#message").val();
    if(message == "") {
        if(specificMessage != "") {
            message = specificMessage;
        } else {
            message = "";
        }
    }
    $.ajax({
        type: "POST",
        url: "php/objects/addLog.php",
        data: {"adminId": adminId, "message": message, "userLocation": currentLocationForTesting},
        success: function(data) {
            console.log("log added " + data);
            sendMessageToTheAdmin(data, currentLocationForTesting, message);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function sendMessageToTheAdmin(adminPhoneNumber, currentLocationForTesting, message) {
    $.ajax({
        type: "POST",
        url: "php/objects/sendMessageToTheAdmin.php",
        data: {"adminPhoneNumber": adminPhoneNumber, "userLocation": currentLocationForTesting, "message": message},
        success: function(data) {
            console.log("Message was already sent to the admin.  " + data);
            alert("A notification was already sent to the admin with contact number " + adminPhoneNumber + ".");
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function contactHospital() {
    $.ajax({
        type: "POST",
        url: "php/objects/contactHospital.php",
        success: function(data) {
            // --- a police station was successfully reached
            console.log("a hospital was successfully reached = " + data);
            getNearestRespondent(data);
        },
        error: function(data) {
            console.log(JSON.stringify(data))
        }
    });
}

function contactFireMen() {
    $.ajax({
        type: "POST",
        url: "php/objects/contactFireMen.php",
        success: function(data) {
            // --- a police station was successfully reached
            console.log("a firemen was successfully reached = " + data);
            getNearestRespondent(data);
        },
        error: function(data) {
            console.log(JSON.stringify(data))
        }
    });
}

function contactRedCross() {
    $.ajax({
        type: "POST",
        url: "php/objects/contactRedCross.php",
        success: function(data) {
            // --- a police station was successfully reached
            console.log("a red cross was successfully reached = " + data);
            getNearestRespondent(data);
        },
        error: function(data) {
            console.log(JSON.stringify(data))
        }
    });
}

function loginUser() {
    var phoneNumber = $("#phoneNumber").val();
    if(phoneNumber.length != 10) {
        console.log("invalid number of digits hmmmm");
    } else {
        phoneNumber = parseFloat(phoneNumber);
        if(Number(phoneNumber) === phoneNumber) {
            phoneNumber = "63"+phoneNumber;
            $.ajax({
                type: "POST",
                url: "php/objects/loginUser.php",
                data: {"phoneNumber": phoneNumber},
                success: function(data) {
                    if(data == "valid") {
                        window.location.assign("message.php");
                    } else {
                        // -- Anjo, notify the user here that it's either his phone number is not registered yet or it isn't verified yet hmm
                        console.log("login = " + data);
                    }
                }
            });
        } else {
            console.log("invalid entry. it's being validated you know.")
        }
    }
}

function sendVerificationCode(phoneNumber, verificationCode) {
    $.ajax({
        type: "POST",
        url: "php/objects/sendVerificationCode.php",
        data: {"phoneNumber": phoneNumber, "verificationCode": verificationCode},
        success: function(data) {
            // Anjo, tell the user that a verification code is being sent to her/his number. Notify the user
            console.log("success sending verification code = " + data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function getUserLocation() {
    var location = $("#userLocation").val();
    console.log("Location here = " + location);
    return location;
}
