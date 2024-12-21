var currentpsw = document.getElementById("current");
var capital = document.getElementById("capital");
var letter = document.getElementById("letter");
var number = document.getElementById("number");
var length = document.getElementById("length");

currentpsw.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

currentpsw.onblur = function() {
  document.getElementById("message").style.display = "none";
}

currentpsw.onkeyup = function() {

  var lowerCaseLetters = /[a-z]/g;
  
  if(currentpsw.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  var upperCaseLetters = /[A-Z]/g;
  if(currentpsw.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
  var numbers = /[0-9]/g;
  if(currentpsw.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  if(currentpsw.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

var newpsw = document.getElementById("new");
var capital1 = document.getElementById("capital1");
var letter1 = document.getElementById("letter1");
var number1 = document.getElementById("number1");
var length1 = document.getElementById("length1");

newpsw.onfocus = function() {
  document.getElementById("message2").style.display = "block";
}

newpsw.onblur = function() {
  document.getElementById("message2").style.display = "none";
}

newpsw.onkeyup = function() {

  var lowerCaseLetters = /[a-z]/g;
  
  if(newpsw.value.match(lowerCaseLetters)) {
    letter1.classList.remove("invalid1");
    letter1.classList.add("valid1");
  } else {
    letter1.classList.remove("valid1");
    letter1.classList.add("invalid1");
  }

  var upperCaseLetters = /[A-Z]/g;
  if(newpsw.value.match(upperCaseLetters)) {
    capital1.classList.remove("invalid1");
    capital1.classList.add("valid1");
  } else {
    capital1.classList.remove("valid1");
    capital1.classList.add("invalid1");
  }

  var numbers = /[0-9]/g;
  if(newpsw.value.match(numbers)) {
    number1.classList.remove("invalid1");
    number1.classList.add("valid1");
  } else {
    number1.classList.remove("valid1");
    number1.classList.add("invalid1");
  }

  if(newpsw.value.length >= 8) {
    length1.classList.remove("invalid1");
    length1.classList.add("valid1");
  } else {
    length1.classList.remove("valid1");
    length1.classList.add("invalid1");
  }
}