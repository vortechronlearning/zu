<?php

if (! function_exists('error'))
{
  function error($key, $message, $redirect)
  {
    $_SESSION['errors'][$key] = $message;
    header('Location: '. $redirect);
    exit;
  }
}

if (! function_exists('validate'))
{
  function validate($field, $redirect)
  {
    if($_POST[$field] == ""){
    	error($field, $field . ' field is required!', $redirect);
    }

    return $_POST[$field];
  }
}

if (! function_exists('reset_error'))
{
  function reset_error()
  {
    $_SESSION['errors'] = [];
  }
}

if (! function_exists('get_rand_str'))
{
  function get_rand_str($length)
      {
          $chars = array_merge(range('a','z'), range('A','Z'), array('!','@','#','$','%','&','*'));
          $length = intval($length) > 0 ? intval($length) : 16;
          $max = count($chars) - 1;
          $str = "";
      
          while($length--) {
              shuffle($chars);
              $rand = mt_rand(0, $max);
              $str .= $chars[$rand];
          }
          return $str;
      }}