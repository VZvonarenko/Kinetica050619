// выполняем после полной загрузки страницы
$(document).ready(function(){
    // скрыть блок #statusinfo
$('#statusinfo').hide();
    // по нажатию на #login выполнить функцию
$('#login').click(function() {

    // берем переменные их полей формы
  var username = $('#username').val();
  var password = $('#password').val();

  $.ajax({
    url: 'authentication.php',                            //обработчик запроса
    type: 'POST',                                         //метод отправки
    data: {'username' : username, 'password' : password}, //данные для обработчика
    dataType: 'html',                                     //тип данных html
    success: function(data) {                             //функция после выполнения запроса
      if(data == 'Готово') {                              //если запрос вернут строку
        window.location.href = "/post.php";               //если вернется /готово/ переадресовываем на другую страницу
       
      } else {
                $('#statusinfo').show();                  //то отобразим скрытый блок
                $('#statusinfo').text(data);              //и вставим текст
              }
    }
  })
});
});