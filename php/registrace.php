<?php
/*zahájení session*/
session_start();
/*připojení souboru pro validaci*/
include ('validace.php');

/*pokud není přihlášen přesměrování na přihlášení*/
if(isset($_SESSION['login_user'])){
  header("location: login.php");
}
/*cookies pro nastavení dark modu nebo light modu*/
if(!isset($_COOKIE["theme"])) {
  setcookie("theme", "dark-theme", time() + 600000000, '/');
}
if(!isset($_COOKIE["checked"])) {
  setcookie("checked", "checked", time() + 600000000, '/');
  header("Location:registrace.php");
} 
/*zavedení neznámých*/
$jmeno="";
$email="";
$heslo="";
$password="";
/*zavedení chyb*/
$chyba1="";
$chyba2="";
$chyba3="";
$chyba4="";
/*zjištění neznámých od uživatele*/
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if(array_key_exists("jmeno",$_POST)) {
    $jmeno = $_POST["jmeno"];
  }
  if(array_key_exists("email",$_POST)) {
    $email = $_POST["email"];
  }
  if(array_key_exists("heslo1",$_POST)) {
    $heslo = $_POST["heslo1"];
  }
  if(array_key_exists("heslo2",$_POST)) {
    $password = $_POST["heslo2"];
  }
/*výpis chyb v případě potřeby*/
  if (!usernamenNotInUse($jmeno)){
    $chyba1 = "Zadané jméno už je použito <br>";
  }

  if(!validateName($jmeno)){
    $chyba1 = "Zadali jste špatně uživatelské jméno<br>";
  }

  if (!validateEmail($email)) {
    $chyba2 = "Zadali jste špatně email";
  }

  if (!validatePassword($heslo)){
    $chyba3 = "Heslo musí být mít 5-12 znaků";
  }

  if (!validatePasswordCheck($heslo,$password)){
    $chyba4 = "Hesla se neshodují";
  }


}

/*kontrola zda všechny hodnoty splňují podmínky a následné osolení hesla a zapsání do souboru*/
if (validateEmail($email) && validateName($jmeno) && validatePassword($heslo) && validatePasswordCheck($heslo, $password) && usernamenNotInUse($jmeno)) {
  if (file_exists("uzivatele.json")) {
    $file = fopen("uzivatele.json","a");
    fwrite($file, $jmeno . " ");
    fwrite($file, $email . " ");
    $passHash = password_hash($heslo, PASSWORD_DEFAULT);
    fwrite($file, $passHash . "\n");
    header("Location:prihlaseni.php");
  }
  else {
    header("Location:registrace.php");
  }
}

?>

<!doctype html>
<html lang="cs">

<head>
  <title> Registrace </title>
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
      <a class="active" href="registrace.php">Registrace</a>
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
  <form method="post" action="registrace.php">
    <fieldset>
      <legend>Registrace:</legend><br><br>
      <label class ="label" for="jmeno">Uživatelské jméno*:</label>
      <input class="input" value="<?php echo htmlspecialchars($jmeno) ?>" type="text" id="jmeno" name="jmeno" required placeholder="Nicole (5-12 znaků)" minlength="5" maxlength="12" pattern="[a-zA-Z0-9-]+" title="Bez háčků a čárek" onkeypress="return event.charCode != 32"><br>
      <span class="hlaska"> <?php echo $chyba1 ?> </span> <span id ="varovani" class="hide"> Toto jméno už je používáno </span> <br>

      <label class ="label" for="email">Email*:</label>
      <input class="input" value="<?php echo htmlspecialchars($email) ?>" type="text" name="email" id="email" required placeholder="Nicoledesign@email.com" minlength="5" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" onkeypress="return event.charCode != 32"><br>
      <span class="hlaska"> <?php echo htmlspecialchars($chyba2) ?> </span><br>

      <label class ="label" for="heslo1">Heslo*:</label>
      <input class="input" type="password" name="heslo1" id="heslo1" required placeholder="***** (5-12 znaků)" minlength="5" maxlength="12" onkeypress="return event.charCode != 32" ><br>
      <span class="hlaska"> <?php echo htmlspecialchars($chyba3) ?> </span><br>

      <label class ="label" for="heslo2">Potvrdit heslo*:</label>
      <input class="input" type="password" name="heslo2" id="heslo2" required placeholder="Hesla musí být totožná" minlength="5" maxlength="12" onkeypress="return event.charCode != 32" ><br>
      <span class="hlaska"> <?php echo htmlspecialchars($chyba4) ?> </span><br>


      <input type="submit" value="Registrovat" name="registrovat">
      <span class="hlaska">* - povinná pole </span>
</fieldset>

  </form>
</div>

<div class="prehoz">
  <p>Už máte učet?</p>
  <a href="prihlaseni.php">Přihlásit se</a>
</div>

<img class ="obrazek" src="../pic/0motyl.png" alt="motyl">
<img class ="obrazek2" src="../pic/1motyl.png" alt="jinymotyl">

  <script src="../js/ajax.js"></script>
  <script src="../js/objednani.js"></script>
  <script src="../js/darktheme.js"></script>
</body>

</html>
