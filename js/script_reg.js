$(document).ready(function(){
$('#statusinfo').hide();
$('#reg').click(function() {
  var username = $('#username').val();
  var password = $('#password').val();
  var email = $('#email').val();

  $.ajax({
    url: 'add_user.php',
    type: 'POST',
    data: {'username' : username, 'password' : password, 'email': email},
    dataType: 'html',
    success: function(data) {
    		
      if(data == 'Такой пользователь зарегистрирован') {
        $('#statusinfo').show();
        $('#statusinfo').text(data);
       
      } else if (data == "Готово"){
                window.location.href = "/post.php";
              }
    }
  })
});
});