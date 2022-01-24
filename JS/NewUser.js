$(function() {
    $("#Logout").hide();
    $(".logElem").hide();

    $.get("../Php/getFlash.php", printFlash, "json");

    /*
    $("#NewUserForm").on("click" , function (){
        checkData();
    })*/

});

function printFlash(json){
    // if isSet is true, then the flash message is set up and displayed
    if(json.isSet){
        if(json.isColor){
            $("#flash").css("color" , "green");
        }
        $("#flash").show();
        $("#flash").text(json.flash);
    } // hide flash message container if there is no message to show
    else{
        $("#flash").hide();
    }
}

function printResult(){
    $(window.location).attr('href', 'http://localhost/Progetto/Html/NewAccount.php');
}

function checkData(){
    a = $('#Username').value;
    b = $('#Email').value;
    c = $('#Password').value;

    if(a == null || a === ""){
        $('#UsernameErr').text('Fill this Field');

    }else if(a.length <5){
        $('#UsernameErr').text('Username too Short, 5 char minimum');

    } else if(b == null || b === ""){
        $('#EmailErr').text('Fill this Field');

    }else if(!validateEmail(b)){
        $('#EmailErr').text('Insert valid Email Address');

    }else if(c == null || c === ""){
        $('#PasswordErr').text('Fill this Field');

    }else if(c.length < 5){
        $('#PasswordErr').text('Password too short, 5 char minimum');

    }else{
        $.post(
            "../Php/NewAccountCheck.php",
            {username: $("#Username").val() , email: $("#Email").val() ,
                psw: $("#Password").val()},
            "json"
        );
    }
}

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}