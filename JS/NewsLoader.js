$(function() {

    $.get("../Php/GetNews.php",
        setNews,
        "json");
});

function setNews (json){
    let len = json[0].elem;

    for(let i=1; i<=len; i++){
        box = $('<div class="col-xl-6 col-12"></div>').append($('<div class="media media-news"></div>')
            .append($(' <div class="media-img"></div>')
                .append($('<img class="NewsImg" alt="Generic placeholder image">').attr('src' , '' +json[i].img+ '')))
            .append($('  <div class="media-body"></div>')
                .append($('<span class="media-date"></span>').text(json[i].date))
                .append($(' <h5 class="mt-0 sep"></h5>').text(json[i].title))
                .append($('<p></p>').text(json[i].sub))
                .append($(' <a href="blog-post-right-sidebar.html" class="btn btn-transparent">View More</a>'))));

        $("#NewsDiv").append(box);
    }
}