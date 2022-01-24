$(function() {

    $.get("../Php/isSeller.php", seller, "json");

});

function seller(json){
    if(!json.isSeller){
        alert("You dont have permissions");
        $(window.location).attr('href', 'http://localhost/Progetto/Html/Login.php');
    }
}