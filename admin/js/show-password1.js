function showPassword() {
  const currentPassword = document.getElementById('current');
  const newPassword = document.getElementById('new');
  const retypePassword = document.getElementById('retype');
  const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

  if (showPasswordCheckbox.checked) {
    currentPassword.type = 'text';
    newPassword.type = 'text';
    retypePassword.type = 'text';
  } else {
    currentPassword.type = 'password';
    newPassword.type = 'password';
    retypePassword.type = 'password';
  }
}