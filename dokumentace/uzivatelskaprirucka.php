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
  <title> Uživatelská příručka </title>
  <link rel="stylesheet" href="styl.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Love+Ya+Like+A+Sister&family=Satisfy&display=swap" rel="stylesheet">

<body class="<?php echo $_COOKIE["theme"];?>">
  <header>
    <a class="logo"> Nicole Design </a>
    <div class="header-right">
      <a href="popisulohy.php">Zadání</a>
      <a class="active" href="uzivatelskaprirucka.php">Příručka</a>
      <a href="popisimplementace.php">Implementace</a>
    </div>
  </header>

<div class="main">

<h1>Uživatelský manuál:</h1>
<h2>1.1 Pohyb na stránce</h2>
<h4>Pohyb uživatele přes jednotlivé stránky je umožněn pomocí navigační lišty v horní části obrazovky. Lišta ukazuje na jaké stránce se momentálně uživatel nachází a přejetím kurzoru také vidí na jakou stránku se snaží dostat. Při kliknutí na logo Nicole Design se dostane uživatel na úvodní stránku.</h4>
<h2>1.2 Přepínání dark a light modu</h2>
<h4>Uživatel si může vybrat jaký vzhled stránky mu vyhovuje a vybrat si ho. Realizovat to může pomocí spínače v pravém horním rohu. Svojí volbu může kdykoliv změnit. Změnou barvy se taky změní uspořádánání navigační lišty.</h4>
<h2>1.3 Registrace / Přihlášení</h2>
<h4> Pouze registrovaný a pak přihlášený uživatel může poslat objednávku. Pro registraci musíte vyplnit uživatelské jméno (uživatelské jméno musí být jedinečné - nikdo jiný ho před vámi nevybral), email pro komunikaci po objednávce a heslo, které musíme dále potvrdit. Pro přihlášení pak stačí zadat své uživatelké jméno a heslo. </h4>
<h2>1.4 Album - ukázka UI</h2>
<h4>Důležitou sekcí stránek je album. Tady si uživatel může každou fotku přiblížit jednoduchým přejetím myši. Obrázek se pomalu zvětší a vy si tak můžete vychutnat detail každé fotografie. Po přesunu kurzoru mimo fotografii se obrázek opět zmenší na původní velikost.</h4>
<h2>1.5 Objednání</h2>
<h4>Poslední částí stránek je objednání. Zde si může každý vybrat z pestré škály barev a motivů. Může si zde navolit svojí kombinaci, kterou pak potvrdí zmáčknutím tlačítka Objednat. Následně je přesměrován na stránku se svojí objednávkou, kterou si může zrušit. Následně je po nějaké době kontaktován na email uvedený při registraci pro dodatečné doplnění informací a požadavků. </h4>
<h2>1.6 Odhlášení</h2>
<h4>Nakonec se uživatel může odhlásit po kliknutí na tlačítko ,,Přihlášení" v horní navigační liště a následném kliknutí na tlačítko ,,odhlásit". V tu chvíli si už nemůže zobrazit svoji objednávku (pro opětovné zobrazení objednávky se musí znovu přihlásit).</h4>













</div>




  <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
      <input type="checkbox" id="checkbox" <?php echo $_COOKIE["checked"];?> name="theme"/>
      <a class="slider round"></a>
    </label>
  </div>

<script src="darktheme.js"></script>

</body>
</html>
