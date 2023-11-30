<?php
function passGenerator()
{
  $symbols = '!?&%$<>^+-*/()[]{}@#_=';
  $letters = 'abcdefghijklmnopqrstuvwxyz';
  $upLetters = strtoupper($letters);
  $numbers = '0123456789';

  if (isset($_GET['passLength']) && $_GET['passLength'] != "") {

    $length = $_GET['passLength'];
    $password = '';

    while (strlen($password) < $length) {
      $characters = $symbols . $letters . $upLetters . $numbers;
      $randomCharacters = $characters[rand(0, strlen($characters) - 1)];

      $password .= $randomCharacters;
    }
    return "Your generated password is: $password";

  } else if (isset($_GET['submit']) && $_GET['passLength'] === '') {
    return 'You must choose between 8 and 20 characters to generate your password';
  }
}

function colorMessage()
{
  if (isset($_GET['submit']) && $_GET['passLength'] != '') {
    return 'alert-success';
  } else {
    return 'alert-danger';
  }
}
?>