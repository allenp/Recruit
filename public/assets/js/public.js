$(document).ready(function() {
  $('#login-button').click(function(e){
    e.preventDefault();
    $('#login-form').toggle();
  });
  /*
  $('#login-form').submit(function() {
    $.post($(this).attr('action'),
      $(this).serialize(),
      function(data) {
        if (data.code != 1) {
          alert(data.messages[0]);
        } else {
          window.location = '/dashboard';
        }
      });
    return false;
  });
  */
});
