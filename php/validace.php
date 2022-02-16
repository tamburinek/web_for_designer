<?php
/*validace emailu*/
function validateEmail($email){
    if (strlen($email) < 3){
        return false;
    }
    if ( preg_match('/\s/',$email)){
      return false;
    }
    if (substr_count($email, "@") > 0){
        return true;
    } else {
        return false;
    }
}
/*validace jména podle délky*/
function validateName($jmeno){
    if (preg_match('/\s/',$jmeno)){
      return false;
    }
    if (strlen($jmeno) > 4 && strlen($jmeno)<13){
            return true;
    }  else {
        return false;
    }
}
/*validace hesla podle délky*/
function validatePassword($heslo){
    if ( preg_match('/\s/',$heslo)){
      return false;
    }
    if (strlen($heslo) > 4 && strlen($heslo)<13){
        return true;
    } else {
        return false;
    }
}
/*validace zda se hesla shodují*/
function validatePasswordCheck($heslo, $password){
        if ($heslo != $password){
            return false;
        } else {
            return true;
        }

}
/*validace zde je uživatelské jméno používáno*/
function usernamenNotInUse ($jmeno) {
  if (file_exists("uzivatele.json")) {
    $lines = file("uzivatele.json");
    foreach ($lines as $line) {
      $user = explode(" ",$line);
      if ($user[0] == $jmeno) {
        return false;
    }
  }
}
  return true;
}

/*validace komentářů k objednávce*/
function validKoment ($koment) {
  if (strlen($koment) > 0 && strlen($koment) < 121 && strlen($koment) > 0) {
    return true;
  } else {
    return false;
  }
}

?>
