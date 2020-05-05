<?php

function user_logged_in(){
  if($_SESSION['loggedin'] && !empty($_SESSION['loggedin'])){
    return true;
  }
  return false;
}
