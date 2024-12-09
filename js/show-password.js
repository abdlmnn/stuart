// Icon Show password
function showPassword1() {
  const eyeClose = document.getElementById('eyeClose');
  const eyeIcon = document.getElementById('eyeicon');
  const password = document.getElementById('psw');

  if(password.type == "password"){

    password.type = "text";

    eyeOpen.style.display = "block"; 
    eyeClose.style.display = "none"; 
  }else{

    password.type = "password";
    
    eyeOpen.style.display = "none";
    eyeClose.style.display = "block";
  }
}
// Icon Show confirm password
function showPassword2() {
  const eyeClose2 = document.getElementById('eyeClose2');
  const eyeIcon2 = document.getElementById('eyeicon2');
  const confirm = document.getElementById('confirm');

  if(confirm.type == "password"){

    confirm.type = "text";

    eyeOpen1.style.display = "block"; 
    eyeClose2.style.display = "none"; 
  }else{

    confirm.type = "password";

    eyeOpen1.style.display = "none";
    eyeClose2.style.display = "block";
  }
}

// Check Box Show password
// function showPassword() {
//     var password = document.getElementById("psw");

//     if (password.type === "password") {
//       password.type = "text";
//     } else {
//       password.type = "password";
//     }
// }