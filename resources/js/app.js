//eye toggle button 
$('#togglePassword').click(function () {
    var passwordField = $('#password');
    var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
    passwordField.attr('type', type);
    $(this).text(type === 'password' ? '👁️' : '🙈');
});

$('#ctogglePassword').click(function () {
 
    var passwordField = $('.confirm-password');
    var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
    passwordField.attr('type', type);
    $(this).text(type === 'password' ? '👁️' : '🙈');
});






