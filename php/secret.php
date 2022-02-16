<?php
/*cookies pro dark mode nebo light mode*/
if(!isset($_COOKIE["theme"])) {
  setcookie("theme", "dark-theme", time() + 600000000, '/');
}
if(!isset($_COOKIE["checked"])) {
  setcookie("checked", "checked", time() + 600000000, '/');
  header("Location:secret.php");
}
?>

<!doctype html>
<html lang="cs">

<head>
  <title> Album </title>
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/secret.css">
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
      <a class="active" href="secret.php">Album</a>
      <a href="nakup.php">Objednání</a>
      <a href="prihlaseni.php">Přihlášení</a>
    </div>
  </header>

  <div class="gallery">
    <div class="clipped-border">
      <img src="../pic/3.jpg" alt="coco" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/1.jpg" alt="broze" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/2.jpg" alt="cernobila" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/4.jpg" alt="destnik" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/5.jpg" alt="písmenko j" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/6.jpg" alt="brož" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/7.jpg" alt="motylek" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/8.jpg" alt="set brože a čelenky" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/9.jpg" alt="čelenka" class="clipped">
    </div>
    <div class="clipped-border">
      <img src="../pic/10.jpg" alt="produkt na člověku" class="clipped">
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
