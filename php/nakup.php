<?php
/*zahájení session*/
session_start();
/*připojení souboru pro validaci*/
include ('validace.php');
/*pokud uživatel není přihlášen, nemůže objednávat a je přesměrovan na přihlášení*/
if(!isset($_SESSION['login_user'])){
  header("location: prihlaseni.php");
}
/*pokud už má nastavenou sessin pro objednávku je přesměrován na svoji objednávku*/
if(isset($_SESSION['ig'])){
  header("location: dekujeme.php");
}
/*cookies pro změnu dark modu*/
if(!isset($_COOKIE["theme"])) {
  setcookie("theme", "dark-theme", time() + 600000000, '/');
}
if(!isset($_COOKIE["checked"])) {
  setcookie("checked", "checked", time() + 600000000, '/');
  header("Location:nakup.php");
}
/*zjištění uživatelského jména*/
$jmeno = $_SESSION["login_user"];
/*funkce pro kontrolu zda uživatel už něco neobjednal*/
function objednano($jmeno) {
    $lines = file("nakupy.json");
    foreach ($lines as $line) {
      $content = explode(" ",$line);
      if ($content[0] == $jmeno) {
        return true;
      }
    }
    return false;
    }
/*pokud uživatel něco objednal ale nějakým způsoben nebyla nastavena ssesion tady je to napraveno*/
if (objednano($jmeno)) {
  $_SESSION['ig']="ahoj";
  header("Location:dekujeme.php");
}
/*zavedení proměných*/
$typ="";
$barva="";
$motiv="";
$koment="";
$ig="";
$zapis=false;
/*kontrola zda uživatel odeslal objednavku -> nastavení hodnot pro zápis*/
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if(array_key_exists("typ",$_POST)) {
    $zapis=true;
    $jmeno = $_SESSION["login_user"];
    $typ=$_POST["typ"];
    $barva=$_POST["barva"];
    $motiv=$_POST["motiv"];
    $koment=$_POST["koment"];
  }
}

/*zapsání komentáře a změna všech mezer na _ pro lepší práci při výpisu*/
if ($zapis && validKoment($koment)) {
  if (file_exists("komenty.json")) {
    $soubor = fopen("komenty.json","a");
    fwrite($soubor, $jmeno . " ");
    $koment = str_replace(" ","_",$koment);
    $vysledek = trim(preg_replace('/\s+/', '_', $koment));
    fwrite($soubor, $vysledek . "\n");
  }
}

/*zápis do souboru*/
if ($zapis) {
  if (file_exists("nakupy.json")) {
    $file = fopen("nakupy.json","a");
    fwrite($file, $jmeno . " ");
    fwrite($file, $typ . " ");
    fwrite($file, $motiv . " ");
    fwrite($file, $barva . "\n");
    $_SESSION['ig']="ahoj";
    header("Location:dekujeme.php");
  }
  else {
    header("Location:nakup.php");
  }
}
?>

<!doctype html>
<html lang="cs">

<head>
  <title> Objednání </title>
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/nakup.css">
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

  <div class="main">
    <form method="post" action="nakup.php">
      <fieldset>
        <legend>Objednání:</legend><br><br>
        <label class="label" for="typ">Typ:</label>

          <select class="vyber" name="typ" id="typ">
            <option value="Brož">Brož</option>
            <option value="Čelenka">Čelenka</option>
            <option value="Set">Set</option>
          </select><br><br>

        <label class="label" for="barva">Barva:</label>

          <select class="vyber" name ="barva" id="barva">
            <optgroup label="Basic">
              <option value="Černá">Černá</option>
              <option value="Červená">Červená</option>
              <option value="Žlutá">Žlutá</option>
              <option value="Zelená">Zelená</option>
              <option value="Modrá">Modrá</option>
              <option value="Fialová">Fialová</option>
              <option value="Hnědá">Hnědá</option>
            </optgroup>
            <optgroup label="Mix">
              <option value="Černobílá">Černobílá</option>
              <option value="Červenožlutá">Červenožlutá</option>
              <option value="Zelenomodrá">Zelenomodrá</option>
              <option value="Fialovohnědá">Fialovohnědá</option>
            </optgroup>
          </select><br><br>

        <label class="label" for="motiv">Motiv:</label>

          <select class="vyber" name="motiv" id="motiv">
            <option value="Motýl">Motýl</option>
            <option value="Chanel">Chanel</option>
            <option value="Pisménko">Pisménko</option>
            <option value="Zvíře">Zvíře</option>

          </select><br><br>

          <label class="label" for="koment">Komentář:</label>

          <textarea class="vyber" id ="koment" name="koment" rows="4" cols="30" placeholder="Zde můžete zadat doplňující informace k objednávce" maxlength="120" onkeypress="return event.charCode != 13 && event.charCode !=95"></textarea>

        <input type="submit" value="Objednat" name="objednat">
      </fieldset>

    </form>
  </div>








  <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
      <input type="checkbox" id="checkbox" name="theme" <?php echo $_COOKIE["checked"];?> />
      <a class="slider round"></a>
    </label>
  </div>

  <img class ="obrazek" src="../pic/diamant.png" alt="diamant">
  <img class ="obrazek2" src="../pic/0motyl.png" alt="motyl">

<script src="../js/koment.js"></script>
<script src="../js/darktheme.js"></script>
</body>
</html>
