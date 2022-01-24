$(function() {

    if($.urlParam('book')){
        $.get("../Php/GetDescription.php",
            {value : $.urlParam('book')},
            loadPage,
            "json");
    }

});

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null) {
        return null;
    }
    return decodeURI(results[1]) || 0;
}

function loadPage(json){
    let len = json[0].elem;
    if(len>0){
        $('#descImg').attr('src' , '' + json[1].img);
        $('#descTit').text('' + json[1].title + ' : ' + json[1].subt);
        $('#descNRev').text('Reviews: ' + json[1].rev);
        $('#descDate').text('Publication date: ' + json[1].pub);
        $('#descText').text('' + json[1].desc);
        $('#descPrice').text('Price: ' + json[1].price + ' $');
        $('#descBuyBtn').on("click" , function (){
            $.post("../Php/addCart.php",
                {item : json[1].id },
                addToCart,
                "json")
        });
        $('#writeRev').on("click" , function(){
            $(window.location).attr('href', 'http://localhost/Progetto/Html/NewRev.php?book=' + json[1].id);
        });
        $.get("../Php/GetReviews.php",
            {value : $.urlParam('book')},
            LoadReviews,
            "json");
    }else{
        $(window.location).attr('href', 'http://localhost/Progetto/Html/ErrorPage.php');
    }

}


function LoadReviews(json){
    let len = json[0].elem;

    for(i = 1 ; i<= len; i++){
        obj = $('<div class="row order divisorSoft"></div>')
            .append($('<div class="col-3 h-100"></div>')
                .append($('<p></p>').text('' + json[i].user)
                )
            )
            .append($('<div class="col-9 h-100"></div>')
                .append($('<p></p>').text('' + json[i].rev)
                )
            );
        $('#revContainer').append(obj);
    }
}