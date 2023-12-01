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

    $characters = '';
    if (count($_GET['characters']) === 3) {
      $characters = $symbols . $letters . $upLetters . $numbers;
    } else if (in_array('letters', $_GET['characters']) && in_array('numbers', $_GET['characters'])) {
      $characters = $letters . $upLetters . $numbers;
    } else if (in_array('symbols', $_GET['characters']) && in_array('numbers', $_GET['characters'])) {
      $characters = $symbols . $numbers;
    } else if (in_array('symbols', $_GET['characters']) && in_array('letters', $_GET['characters'])) {
      $characters = $symbols . $letters . $upLetters;
    } else if (in_array('letters', $_GET['characters'])) {
      $characters = $letters . $upLetters;
    } else if (in_array('numbers', $_GET['characters'])) {
      $characters = $numbers;
    } else if (in_array('symbols', $_GET['characters'])) {
      $characters = $symbols;
    }


    while (strlen($password) < $length) {
      $randomCharacters = $characters[rand(0, strlen($characters) - 1)];
      if (!$_GET['repeated']) {
        if (!str_contains($password, $randomCharacters)) {
          $password .= $randomCharacters;
        }
      } else {
        $password .= $randomCharacters;
      }



    }
    $_SESSION['password'] = "Your generated password is: $password";
    header('Location: generated.php');

  } else if (isset($_GET['submit']) && $_GET['passLength'] === '') {
    return 'You must choose between 8 and 20 characters to generate your password';
  }
}

?>