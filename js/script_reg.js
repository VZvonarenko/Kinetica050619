// выполняем после полной загрузки страницы
$(document).ready(function(){
  // скрыть блок #statusinfo
$('#statusinfo').hide();
 // по нажатию на #reg выполнить функцию
$('#reg').click(function() {

  // берем переменные их полей формы
  var username = $('#username').val();
  var password = $('#password').val();
  var email = $('#email').val();

  $.ajax({
    url: 'add_user.php',          //обработчик запроса
    type: 'POST',                 //метод отправки
    data: {'username' : username, 'password' : password, 'email': email},   //данные для обработчика
    dataType: 'html',             //тип данных html
    success: function(data) {     //функция после выполнения запроса
    		
      if(data == 'Такой пользователь зарегистрирован') {    //если запрос вернут строку
        $('#statusinfo').show();                            //то отобразим скрытый блок
        $('#statusinfo').text(data);                        //и вставим текст
       
      } else if (data == "Готово"){                         //если вернется /готово/ переадресовываем на другую страницу
                window.location.href = "/post.php";
              }
    }
  })
});
});