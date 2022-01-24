$(function() {

    $.get("../Php/GetOrders.php",
        setOrders,
        "json");

});

function setOrders (json){
    $("#body").empty();

    let len = json[0].elem;

    pageTitle = $('<div class="row items"></div>')
        .append($('<div class="row justify-content-center order"></div>')
            .append($('<div class="row ordNum"></div>')
                .append($('<div class="col-12 "></div>')
                    .append($('<h3>Your Orders</h3>')))));

    $("#body").append(pageTitle);

    for(let i=1; i<=len; i++){
        if(!($('#' + json[i].transaction).length)){

            ord = $('<div class="row items"></div>')
                .append($('<div class="row justify-content-center order"></div>').attr('id' , ''+json[i].transaction+'')
                    .append($('<div class="row ordNum d-flex justify-content-end"></div>')
                        .append($('<div class="col-12 d-flex justify-content-end"></div>')
                            .append($('<h6></h6>').text('Order N :' + json[i].transaction + '')
                            )
                        )
                    )
                );

            $("#body").append(ord);
        }

        item = $('<div class="row item"></div>')
            .append($('<div class="col-4"></div>')
                .append($('<img class="cartImg">').attr('src' , '' + json[i].img + ''))
            )
            .append($('<div class="col-8"></div>')
                .append($('<h6></h6>').text('Title: ' + json[i].title + ''))
                .append($('<p ></p>').text('Subtitle: ' + json[i].subt + ''))
                .append($('<h6></h6>').text('Price: ' + json[i].price + ''))
                .append($(' <h6></h6>').text('qty: ' + json[i].qty + ''))
            );

        $('#' + json[i].transaction).append(item);

    }

}

function reloadPage (json){
    $.get("../Php/GetProd.php",
        setOrders,
        "json");
    // $(window.location).attr('href', 'http://localhost/Progetto/Html/Catalogue.php');
}