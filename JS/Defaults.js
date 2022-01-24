$(function() {

    $.get("../Php/ErrorCheck.php", printWelcome, "json");

    $("#Logout").on("click" , function(){
        $.get("../Php/Logout.php",
            goToLogin)
    })

    $.get("../Php/isSeller.php", chartOn, "json");

});

function printWelcome(json){
    if(json.isLogged){
        $("#welcome").show();
        $("#welcome").text(json.name);
    } // hide flash message container if there is no message to show
    else{
        $("#flash").hide();
        $(window.location).attr('href', 'http://localhost/Progetto/Html/Login.php');
    }
}

function goToLogin(){
    $(window.location).attr('href', 'http://localhost/Progetto/Html/Login.php');
}

function chartOn(json){
    if(json.isSeller){
        $("#chartBtn").hide();
        $("#OrderLink").hide();
        //$("#HomeLink").attr('href', 'http://localhost/Progetto/Html/IndexSeller.php');
        //$("#CatLink").attr('href', 'http://localhost/Progetto/Html/UploadBook.php');
        //$("#CatLink").text('Upload Book');
    }
    else{
        $("#chartBtn").show();
    }
}

