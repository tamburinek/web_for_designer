<?php
/*zahájení session*/
session_start();
/*zavedení proměných*/
$ig="";
$typ="error";
$barva="error";
$motiv="error";
/*pokud je nastavená session nastavení hodnoty pro hledání v souboru*/
if(isset($_SESSION["login_user"])) {
  $jmeno = $_SESSION["login_user"];
}
/*pokud není přihlášen přesměrován na přihlášení*/
if(!isset($_SESSION["login_user"])) {
  header("Location:prihlaseni.php");
}
/*funkce pro nalezení uživatele*/
function getUsername($jmeno) {
  $lines = file("nakupy.json");
  foreach ($lines as $line) {
    $user = explode(" ",$line);
    if ($user[0] == $jmeno) {
      return true;
    }
  }
  return false;
}
/*zjištění zákazníkovo barvy*/
function getBarva($jmeno) {
  $lines = file("nakupy.json");
  foreach ($lines as $line) {
    $content = explode(" ",$line);
    if ($content[0] == $jmeno) {
      $barva = str_replace("\n","", $content[3]);
      return $barva;
    }
  }
  return false;
  }
/*zjištění zákázníkův typ objednávky*/
function getTyp($jmeno) {
    $lines = file("nakupy.json");
    foreach ($lines as $line) {
      $content = explode(" ",$line);
      if ($content[0] == $jmeno) {
        $typ = str_replace(" ","", $content[1]);
        return $typ;
      }
    }
    return false;
    }
/*zjištění motivu objednávky*/
function getMotiv($jmeno) {
    $lines = file("nakupy.json");
    foreach ($lines as $line) {
      $content = explode(" ",$line);
      if ($content[0] == $jmeno) {
        $motiv = str_replace(" ","", $content[2]);
        return $motiv;
      }
    }
    return false;
    }
/*zjištění komentáře k objednávce*/
function getKoment($jmeno) {
    $lines = file("komenty.json");
    foreach ($lines as $line) {
      $content = explode(" ",$line);
      if ($content[0] == $jmeno) {
        $koment = str_replace("_"," ", $content[1]);
        $vysledek = str_replace("\n","", $koment);
        return $vysledek;
      }
    }
    return false;
    }
/*pokud objednávka není v souboru je uživatel přesměrován na objednání*/
if (!getUsername($jmeno)) {
  unset($_SESSION['ig']);
  header("Location: nakup.php");
}
/*přiřazení hodnot*/
$barva=getBarva($jmeno);
$typ=getTyp($jmeno);
$motiv=getMotiv($jmeno);
$coment=getKoment($jmeno);

/*cookies pro změnu dark a light modu*/
if(!isset($_COOKIE["theme"])) {
  setcookie("theme", "dark-theme", time() + 600000000, '/');
}
if(!isset($_COOKIE["checked"])) {
  setcookie("checked", "checked", time() + 600000000, '/');
  header("Location:login.php");
}
?>

<!doctype html>
<html lang="cs">

<head>
  <title> Děkujeme za váš nákup </title>
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/dekujeme.css">
  <link rel="stylesheet" media="print" href="../css/print.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>

<body class="<?php echo $_COOKIE["theme"];?>">
  <header>
    <a href="omne.php" class="logo"> Nicole Design </a>
    <div class="header-right">
      <a href="omne.php">Nicole</a>
      <a href="produkty.php">Produkty</a>
      <a href="secret.php">Album</a>
      <a class="active" href="nakup.php">Objednání</a>
      <a href="prihlaseni.php">Přihlášení</a>
    </div>
  </header>

<div class=main>

<h1>Děkujeme za objednávku<br>V nejbližší době se s vámi spojíme</h1>
<?php echo "Vaše objednávka: <br> <h2>";echo "Typ: "; echo htmlspecialchars($typ); echo "<br>";
echo "Barva: "; echo htmlspecialchars($barva); echo "<br>";
echo "Motiv: "; echo htmlspecialchars($motiv); echo "</h2>" ?>
<br><br>
<?php
if (strlen($coment) != 0){
    echo "Komentář k objednávce: <br> <h2>";echo htmlspecialchars($coment);echo"</h2>";
}
?>
<div class="prehoz">
<a href="zrusit.php">Smazat objednávku</a>
</div>

<img class ="obrazek" src="../pic/diamant.png" alt="diamant">
<img class ="obrazek2" src="../pic/0motyl.png" alt="motyl">


</div>
  <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
      <input type="checkbox" id="checkbox" name="theme" <?php echo $_COOKIE["checked"];?> />
      <a class="slider round"></a>
    </label>
  </div>

<script src="../js/darktheme.js"></script>
</body>
</html>
