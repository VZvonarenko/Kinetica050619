$(document).ready(function(){
$('#statusinfo').hide();
$('#login').click(function() {
  var username = $('#username').val();
  var password = $('#password').val();

  $.ajax({
    url: 'authentication.php',
    type: 'POST',
    data: {'username' : username, 'password' : password},
    dataType: 'html',
    success: function(data) {
      if(data == 'Готово') {
        window.location.href = "/post.php";
       
      } else {
                $('#statusinfo').show();
                $('#statusinfo').text(data);
              }
    }
  })
});
});