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
  <title> Popis úlohy </title>
  <link rel="stylesheet" href="styl.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Love+Ya+Like+A+Sister&family=Satisfy&display=swap" rel="stylesheet">

<body class="<?php echo $_COOKIE["theme"];?>">
  <header>
    <a class="logo"> Nicole Design </a>
    <div class="header-right">
      <a class="active" href="popisulohy.php">Zadání</a>
      <a href="uzivatelskaprirucka.php">Příručka</a>
      <a href="popisimplementace.php">Implementace</a>
    </div>
  </header>

<div class="main">

<h1>Zadání semestrální práce:</h1>
<h4> Zadáním práce bylo vytvořit webové stránky pro módní návrhářku. Hlavním cílem bylo dodržet minimalismus (minimum barev, nepřeplácat stránku a nechat hodně volného místa, což je v této době velmi moderní). Hlavním smyslem stránek je propagace práce návrhářky a snadné objednání. Povinností bylo vytvoření zajímavé galerie, která ukáže hlavní výtvory a bude dost moderní a zajímavá. Také bylo podmínkou udělat webové stránky opravdu jednoduché na použití pro co nejlepší zážitek z použití.</h4>
<h2>Podmínky:</h2>
<h4>Práce měla předem dané body, které musela splnit. Patří mezi ně přihlašování uživatelů, neztrácení se vyplněných údajů, bezpečná práce s heslem, nepoužívat html pro formátování, javascript pro kontrolu formulářů a nakonec dokumentace. </h4>
</div>
















  <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
      <input type="checkbox" id="checkbox" <?php echo $_COOKIE["checked"];?>  name="theme"/>
      <a class="slider round"></a>
    </label>
  </div>


<script src="darktheme.js"></script>

</body>
</html>
