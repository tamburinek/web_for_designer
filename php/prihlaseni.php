<?php
/*zahájení session*/
session_start();
/*připojení souboru pro validaci*/
include ('validace.php');
/*pokud už je uživatel přihlášen je přesměrován na jinou stránku*/
if(isset($_SESSION['login_user'])){
  header("location: login.php");
}
/*cookies pro přepínání light a dark modu*/
if(!isset($_COOKIE["theme"])) {
  setcookie("theme", "dark-theme", time() + 600000000, '/');
}
if(!isset($_COOKIE["checked"])) {
  setcookie("checked", "checked", time() + 600000000, '/');
  header("Location:prihlaseni.php");
}
/*funkce pro nalezení uživatele*/
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
/*funkce pro nalezeni hesla uživatele*/
function getPassword($jmeno) {
  $lines = file("uzivatele.json");
  foreach ($lines as $line) {
    $content = explode(" ",$line);
    if ($content[0] == $jmeno) {
      $userHash = str_replace("\n","", $content[2]);
      return $userHash;
    }
  }
  return NULL;
  }
/*zavedení neznámých*/
$chyba1="";
$chyba2="";

$jmeno="";
$heslo2="";

/*nastavení hodnot od uživatele*/
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if(array_key_exists("jmeno",$_POST)) {
    $jmeno = $_POST["jmeno"];
  }
  if(array_key_exists("heslo1",$_POST)) {
    $heslo2 = $_POST["heslo1"];
  }
  if (usernamenNotInUse($jmeno)){
    $chyba2 = "Zadali jste špatné uživatelské jméno nebo heslo";
  }
  $heslo = getPassword($jmeno);
  if (!password_verify($heslo2,$heslo)){
    $chyba2 = "Zadali jste špatné uživatelské jméno nebo heslo";
  }
}
/*zjištění hesla ze souboru*/
$heslo = getPassword($jmeno);
/*pokud heslo sedí je uživatel přihlášen a přesměrován*/
if (password_verify($heslo2,$heslo)){
  $_SESSION['login_user']=$jmeno;
  header("Location: login.php");
}


?>

<!doctype html>
<html lang="cs">

<head>
  <title> Přihlášení </title>
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/objednani.css">
  <link rel="stylesheet" media="print" href="../css/print.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>

<body class="<?php echo $_COOKIE["theme"];?>">
  <header>
    <nav>
    <a href="omne.php" class="logo"> Nicole Design </a>
    <div class="header-right">
      <a href="omne.php">Nicole</a>
      <a href="produkty.php">Produkty</a>
      <a href="secret.php">Album</a>
      <a href="nakup.php">Objednání</a>
      <a class="active" href="prihlaseni.php">Přihlášení</a>
    </div>
  </nav>
  </header>

  <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
      <input type="checkbox"  id="checkbox" name="theme" <?php echo $_COOKIE["checked"];?> />
      <a class="slider round"></a>
    </label>
  </div>

<div class="main">
  <form method="post" action="prihlaseni.php">
    <fieldset>
      <legend>Přihlášení:</legend><br><br>
      <label class ="label" for="jmeno">Uživatelské jméno:</label>
      <input class="input"  value ="<?php echo htmlspecialchars($jmeno)?>" type="text" id="jmeno" name="jmeno" required placeholder="Nicole (5-12 znaků)" pattern="[a-zA-Z0-9-]+" onkeypress="return event.charCode != 32"><br>
      <span class="hlaska"> <?php echo htmlspecialchars($chyba1) ?> </span><br>

      <label class ="label" for="heslo1">Heslo:</label>
      <input class="input"  type="password" name="heslo1" id="heslo1" required placeholder="***** (5-12 znaků)" onkeypress="return event.charCode != 32" ><br>
      <span class="hlaska"> <?php echo htmlspecialchars($chyba2) ?> </span><br>

      <input type="submit" value="Přihlásit" name="registrovat">
</fieldset>
  </form>
</div>

<div class="prehoz">
  <p>Ještě nemáte účet?</p>
  <a href="registrace.php">Registrovat se</a>
</div>


<img class ="obrazek" src="../pic/0motyl.png" alt="motyl">
<img class ="obrazek2" src="../pic/1motyl.png" alt="jinymotyl">

  <script src="../js/login.js"></script>
  <script src="../js/darktheme.js"></script>
</body>

</html>
