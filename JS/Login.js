$(function() {
    $("#flash").hide();
    $(".logElem").hide();

    // print flash message if it has been set
    $.get("../Php/getFlash.php", printFlash, "json");

    /*
    $("#LogInForm").on("submit" , function (e){
        e.preventDefault();
         $.post("../Php/LoginCheck.php",
            { username: $("#Email").val(), pwd: $("#Password").val()},
            "json")
    });*/

    /*
    $("#btn").on("click" , function(){
     $.post("../Php/LoginCheck.php",
        { username: $("#Email").val(), pwd: $("#Password").val()},
         goToIndex,
         "json")
    })*/

});


function printFlash(json){
// if isSet is true, then the flash message is set up and displayed
    if(json.isSet){
        $("#flash").show();
        $("#flash").text(json.flash);
    } // hide flash message container if there is no message to show
    else{
        $("#flash").hide();
    }
}

function goToIndex(json){
// go to index.php if logged in, back to login.php otherwise
    if(json.isLogged){
        //$(window.location).attr('href', 'http://localhost/Progetto/Html/Index.php');
    }
    else {
        //$(window.location).attr('href', 'http://localhost/Progetto/Html/Login.php');
    }
}


