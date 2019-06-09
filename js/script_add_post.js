$(document).ready(function(){
var inProgress = false;
var start = 5;
 $(window).scroll(function() {
if($(window).scrollTop() + $(window).height() >= $(document).height() && !inProgress) {

        $.ajax({
           url: 'ajax/query_post.php',
           method: 'POST',
           data: {'start' : start},
           beforeSend: function() {
            inProgress = true;
           }
           }).done(function(data){
               data = jQuery.parseJSON(data);
               
               if (data.length > 0)  {
                $.each(data, function(index, data) {
                   $("#posts").append(
                    "<h2 class='card-title'>" + data.title + "</h2>"+"<p class='card-text'>" + data.text + "</p>" + "<h6 class='card-subtitle'>Автор поста: <em>" + data.author + "</em></h5>" + "<a class='card-link' href=/comment.php?id=" + data.id + ">Читать комментарии</a>" + "<hr align='center' width=90% size='50' color='#dddddd'/>"
                    );
            });
                inProgress = false;
                start+=2; 
               } 

            })
        }
    });
});