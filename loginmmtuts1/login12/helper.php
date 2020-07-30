<?php
function validate_input_text($textValue)
{
  if (!empty($textValue)){
    $trim_text = trim($textValue);
    // remove illegal characters
    $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
    return $sanitize_str;
  }
  return "";
}


function validate_input_email($emailValue)
{
  if (!empty($emailValue)){
    $trim_text = trim($emailValue);
    // remove illegal characters
    $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
    return $sanitize_str;
  }
  return "";
}
