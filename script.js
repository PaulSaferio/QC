const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

/*function forgotPassword() {
    document.getElementById('login-form-container').style.display = 'none';
    document.getElementById('forgot-password-container').style.display = 'block';
}


document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
    e.preventDefault();
    // Hide the login form
    document.getElementById('login-form-container').style.display = 'none';
    // Show the forgot password form
    document.getElementById('forgot-password-container').style.display = 'block';
});

document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Logic to validate user ID can be added here
    alert('User ID submitted successfully! Now reset your password.');
    // Hide the forgot password form and show reset password form
    document.getElementById('forgot-password-container').style.display = 'none';
    document.getElementById('reset-password-container').style.display = 'block';
});

document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (newPassword !== confirmPassword) {
        alert('Passwords do not match!');
    } else {
        // Logic to reset password can be added here
        alert('Password reset successfully!');
        // After resetting, show the login form again
        document.getElementById('reset-password-container').style.display = 'none';
        document.getElementById('login-form-container').style.display = 'block';
    }
});

// Toggle password visibility
document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
});*/
