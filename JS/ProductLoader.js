$(function() {

    $.get("../Php/GetProd.php",
        setProd,
        "json");

    $('input[name="filter"]').on("change" , function(){
        if($('input[name="filter"]').each(function(){
            if(!$(this).is('checked'))
                return true;
        })===true){
        }else{
            $('input[name="filter"]').not(this).prop('checked', false);
            $.post("../Php/setFilter.php",
                {value : $('input[name="filter"]:checked').val()},
                reloadPage,
                "json")
        }
    });
});

function setProd (json){
   $("#products").empty();

    let len = json[0].elem;

    for(let i=2; i<=len+1; i++){
        prod = $('<div class="col-md-4"></div>').append(
            $('<figure class="card card-product"></figure>')
                .append($(' <div class="img-wrap"></div>')
                    .append($('<img>').attr('src' , '' + json[i].img + '')))
                .append($(' <figcaption class="info-wrap"></figcaption>')
                    .append($(' <h4 class="title"></h4>').text(json[i].title))
                    .append($('<p class="desc"></p>').text(json[i].subt))
                    .append($('<div class="rating-wrap"></div>')
                        .append($(' <div class="label-rating"></div>').text('Reviews: ' + json[i].rev))
                        .append($('<div class="label-rating"></div>').text('Publication date: ' + json[i].pub))
                        .append($('<div class="label-rating"></div>')
                            .append($('<a class="pageLink">Description</a>').attr('href' , 'Description.php?book=' + json[i].id + '')))))
                .append($('<div class="bottom-wrap d-flex"></div>')
                    .append($('<div class="price-wrap h5 w-50"></div>')
                        .append($('<span class="price-new"></span>').text('$ '+ json[i].price)))
                    .append($('<div class="d-flex justify-content-end w-50"></div>')
                        .append($(' <button class="btn btn-sm btn-primary justify-content-end shop">Add to Cart</button>').val('' + json[i].id + '')
                            .attr('id' , ''+ json[i].id + '').on("click" , function (){
                                $.post("../Php/addCart.php",
                                    {item : $("#"+json[i].id+"").val()},
                                    addToCart,
                                    "json")
                            }))))
        );

        $("#products").append(prod);
        /*
        if(json[1].isset){
            let cnum = json[1].num;
            $("input[value="+ cnum + "]").prop('checked', true);
        }else{
            $("#products").empty();
        }*/
    }
}

function reloadPage (json){
    $.get("../Php/GetProd.php",
        setProd,
        "json");
   // $(window.location).attr('href', 'http://localhost/Progetto/Html/Catalogue.php');
}

