<?php
/*získání vyplněného políčka*/
$jmeno = $_GET["user"];
/*funkce pro nalezení existujícího uživatele*/
function getUsername($jmeno) {
  $lines = file("uzivatele.json");
  foreach ($lines as $line) {
    $user = explode(" ",$line);
    if ($user[0] == $jmeno) {
      return true;
    }
  }
  return false;
}
/*zjištění zda uživatel existuje či nikoliv*/
if (getUsername($jmeno)) {
  echo "0";
} else {
  echo"1";
}
 ?> 
