//eye toggle button 
$('#togglePassword').click(function () {
    alert('sdflkjsdfkl');
    var passwordField = $('#password');
    var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
    passwordField.attr('type', type);
    $(this).text(type === 'password' ? '👁️' : '🙈');
});

$('#ctogglePassword').click(function () {
    alert('sdfkljdskl');
    var passwordField = $('#confirm-password');
    var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
    passwordField.attr('type', type);
    $(this).text(type === 'password' ? '👁️' : '🙈');
});





