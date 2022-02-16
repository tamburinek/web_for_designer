<?php
/*cookies pro přepínání light a dark modu*/
if(!isset($_COOKIE["theme"])) {
  setcookie("theme", "dark-theme", time() + 600000000, '/');
}
if(!isset($_COOKIE["checked"])) {
  setcookie("checked", "checked", time() + 600000000, '/');
  header("Location:omne.php");
}
?>

<!doctype html>
<html lang="cs">

<head>
  <title> Nicole Design </title>
  <link rel="stylesheet" href="../css/omne.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" media="print" href="../css/print.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Love+Ya+Like+A+Sister&family=Satisfy&display=swap" rel="stylesheet">

<body class="<?php echo $_COOKIE["theme"];?>">
  <header>
    <a href="omne.php" class="logo"> Nicole Design </a>
    <div class="header-right">
      <a class="active" href="omne.php">Nicole</a>
      <a href="produkty.php">Produkty</a>
      <a href="secret.php">Album</a>
      <a href="nakup.php">Objednání</a>
      <a href="prihlaseni.php">Přihlášení</a>
    </div>
  </header>


  <div class="main">
    <img class="uvodka" alt="anna uvodní fotografie" src="../pic/1uvodka.png">
    <div class="text">
      <h1>Vítejte na stránkách Nicole Design</h1>
      <p> Každá z Vás si zaslouží být opravdovou princeznou!<br> Ponořte se do pohádkového světa!!! <br><br>
        Tady si můžete vybrat brože a čelenky ruční výroby přesně podle Vašich představ. Vše je zhotoveno z nejkvalitnějších materiálů a bezpečně zabaleno pro expedici. Při nákupu brože či čelenky máte jistotu, že jste si pořídili jedinečnou věc,
        kterou nikdo jiný na světě nemá. Každý bude uchvácen Vašim doplňkem k oblečení, který se hodí na každou formální i neformální událost. <br><br>
        <strong>Ig: @annanicoledesign </strong>
      </p>

    </div>
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
