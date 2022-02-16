<?php
session_start();
/*pokud uživatel není přihlášen je přesměrován*/
if(!isset($_SESSION["login_user"])) {
  header("Location:prihlaseni.php");
}

/*cookies pro změnu modu*/
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
  <title> Login </title>
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/login.css">
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
      <a href="nakup.php">Objednání</a>
      <a class="active" href="prihlaseni.php">Přihlášení</a>
    </div>
  </header>

<div class=main>

<h1>Už jste přihlášen. <br>Nyní se Vám otevřely objednávky</h1>
<div class="prehoz">
<a href="logout.php">Odhlásit se</a>
</div>


<img class ="obrazek" src="../pic/0motyl.png" alt="motyl">
<img class ="obrazek2" src="../pic/1motyl.png" alt="jinymotyl">


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
