$(function() {

   $("button[name='revForm']").on("click" , function (){
      let text = $("#revForm").val();

      let book = $.urlParam('book');

      $.post("../Php/addReview.php",
          {item1 : text , item2 : book},
          thankYouPage,
          "json")
   });

});

$.urlParam = function(name){
   var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
   if (results==null) {
      return null;
   }
   return decodeURI(results[1]) || 0;
}

function thankYouPage(json){
   if(json === 1){
      $(window.location).attr('href', 'http://localhost/Progetto/Html/ErrorPage.php');
   }else if(json === 0){
      alert("Write a comment");
   }
   else{
      $(window.location).attr('href', 'http://localhost/Progetto/Html/ThankYouPage.php');
   }
}