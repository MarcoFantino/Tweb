
$(function() {

    $.get("../Php/setCart.php",
        setCart,
        "json");

});

function setCart(json){
    $(".offcanvas-body").empty();

    let len = json[0].num;

    if (len === 0) {

        $(".offcanvas-body").empty();

    } else {

        for (let i = 1; i <= len; i++) {
            elem = ($(' <div class="row cartRow"></div>')
                .append($('<div class="col-4 h-100 col align-self-center" ></div>')
                    .append($('<img src="" class="cartImg">').attr('src', '' + json[i].img + '')))
                .append($('<div class="col-8 h-100"></div>')
                    .append($('<h6>Title</h6>').text(json[i].title))
                    .append($('<p >Subtitle</p>').text(json[i].subt))
                    .append($(' <div class="price-wrap w-50"></div>')
                        .append($('<span class="h6"></span>').text(json[i].price + ' $')))
                    .append($('<div></div>')
                        .append($('<ul class="list-group list-group-horizontal listStyle"></ul>')
                            .append($('<li class="cartListItems d-flex align-items-center" ></li>')
                                .append(($('<span>qty: </span>')))
                                .append($('<input type="text" name="quantity" class="form-control input-number textBox" min="1" max="100" disabled>').attr({
                                    'name': '' + json[i].id + '',
                                    'value': '' + json[i].quant + ''
                                })))
                            .append($('<li class="cartListItems d-flex align-items-center"></li>')
                                .append($('<button>Delete</button>').val('' + json[i].id + '').attr('name' , ''+json[i].id+'').on("click" ,  function (){
                                    $.post("../Php/removeCart.php",
                                        {item : $("button[name ="+json[i].id+"]").val()},
                                        refreshCart)
                                    })))))));

            $(".offcanvas-body").append(elem);
        }

        bar = ($('<div class="row" id="buyBar"></div>')
            .append($('<div class="col-6 d-flex align-items-center">')
                .append($(' <span id="totalPrice"></span>').text("Total : " + json[len+1].cartTot + " $")))
            .append($('<div class="col-6 float-right d-flex justify-content-end"></div>')
                .append($('<button type="button" class="btn btn-primary logElem">Buy</button>').on("click" , function (){
                    $.post("../Php/buyCart.php",
                        refreshCart,
                        "json")
                }))));

        $(".offcanvas-body").append((bar));
    }
}

function addToCart(json){
    $.get("../Php/setCart.php",
        setCart,
        "json");
}

function refreshCart(){
    location.reload();
}


