$(function() {

    $("#Logout").on("click" , function(){
        $.get("../Php/Logout.php",
            goToLogin)
    })

});

function goToLogin(){
    $(window.location).attr('href', 'http://localhost/Progetto/Html/Login.php');
}