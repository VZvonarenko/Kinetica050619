// выполняем после полной загрузки страницы
$(document).ready(function(){

// устанавливаем переменные: флаг для определения работы скрипта и с какого элемента стартовать будет запрос при выборке
var inProgress = false;
var start = 5;

//выполнять при скролле
 $(window).scroll(function() {

//если кол-во прокрученных пикселей от верха + высота окна >= высота документы и флаг выполнения скрипта установлен в true то выполняем ajax запрос
if($(window).scrollTop() + $(window).height() >= $(document).height() && !inProgress) {

        $.ajax({
           url: 'ajax/query_post.php',                  //обработчик запроса
           method: 'POST',                              //метод отправки
           data: {'start' : start},                     //данные для обработчика - переменная start
           beforeSend: function() {                     //функция до выполнения запроса: ставим флаг выполнения в true
            inProgress = true;
           }
           }).done(function(data){                      //функция после выполнения запроса
               data = jQuery.parseJSON(data);           //разбираем строку JSON формата
               
               if (data.length > 0)  {                  //пока данные есть выполняем следующее:
                $.each(data, function(index, data) {    //переборка данных: разбиваем на index и данные
                   $("#posts").append(                  //вставляет в id="posts" строку html c данными
                    "<h2 class='card-title'>" + data.title + "</h2>"+"<p class='card-text'>" + data.text + "</p>" + "<h6 class='card-subtitle'>Автор поста: <em>" + data.author + "</em></h5>" + "<a class='card-link' href=/comment.php?id=" + data.id + ">Читать комментарии</a>" + "<hr align='center' width=90% size='50' color='#dddddd'/>"
                    );
            });
                inProgress = false;                     //переводить статус в false - скрипт не выполняется
                start+=2;                               //увеличивает start на 2.
               } 

            })
        }
    });
});