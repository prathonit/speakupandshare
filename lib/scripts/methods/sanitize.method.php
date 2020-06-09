<?php
//sanitize a string
function sanitize_input($input){
  $input = htmlspecialchars($input);
  $input = stripslashes($input);
  $input = trim($input);
  $input = filter_var($input, FILTER_SANITIZE_STRING);
  return $input;
}
//sanitize a array
function sanitize_array($q) {
  foreach ($q as $key=>$value) {
    $q[$key] = sanitize_input($value);
  }
  return $q;
}
//parsing arrays
function getSanitizedFields($array, $req, $except) {
  foreach ($req as $key=>$value) {
    if (isset($array[$value])) {
      $response[$value] = sanitize_input($array[$value]);
    } else if (isset($except[$value]))  {
      $response[$value] = sanitize_input($except[$value]);
    }
    else {
      return False;
      exit();
    }
  }
  return $response;
}
?>