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
  <title> Implementace </title>
  <link rel="stylesheet" href="styl.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Love+Ya+Like+A+Sister&family=Satisfy&display=swap" rel="stylesheet">

<body class="<?php echo $_COOKIE["theme"];?>">
  <header>
    <a class="logo"> Nicole Design </a>
    <div class="header-right">
      <a href="popisulohy.php">Zadání</a>
      <a href="uzivatelskaprirucka.php">Příručka</a>
      <a class="active" href="popisimplementace.php">Implementace</a>
    </div>
  </header>

  <div class="main">
    <h2>HTML</h2>
    <h4>Mezi použité nove HTML5 značky patří zejména NAV a HEADER. Také jsou použity nové input atributy - PLACEHOLDER, REQUIRED, PATTERN. </h4>

    <h2>CSS</h2>
    <h4>Nejdůležitější a nejsložitější je práce s albem. Což považuju za <span>CSS zajímavost</span>.<br>
    Vše kolem Alba je vytvořeno pouze s využitím HTML a CSS. Pomocí css jsou jednotlivé fotografie uvedeny do tvaru šestiuhelníku a pomocí :hover se fotografie zvětšují a pak po přejetí kurzoru pryč opět zmenšují. Také pomocí CSS je switch vytvarován do jeho finální pěkné podoby. </h4>

    <h2>JS</h2>
    <h4>JS v tomto projektu má dvě funkce. Zaprvé kontroluje zda uživatel zadal správné hodnoty při registraci či přihlášení a to již při opuštění políčka formuláře. Zadruhé pomocí JS je umožněno přepínání mezi dark a light modem. Samozřejmě stránky jsou použitelné i bez JS, ale JS hodně pomáhá k plynulému chodu stránek a příjemnému zážitku uživatele.<br> JS kontroluje při vyjetí z políčka a při submitu zda jméno je dlouhé 5-12 znaků, to samé platí pro heslo. U emailu JS kontroluje zda obsahuje zavináč a tečku a zda je alespoň 5 symbolů dlouhý. Také pomocí AJAX probíhá kontrola zda je uživatelem vyplněné jméno již zabráno či nikoliv a to ještě dřív než se pokusí formulář odeslat. <br> Druhou funkcí jak již bylo řečeno je přepínání mezi dark a light modem. JS kouká zda-li nenastala změna u switche a podle toho mění class u body. Tím mění barvy a rozložení stránky. Také nastavuje cookies pro uložení informace pro další použití stránek.
    </h4>

    <h2>PHP</h2>
    <h4>PHP se stará o registraci a přihlášení uživatelů. Zapisuje uživatele do souboru a následně je čte. Chrání před zlým uživatelem a kontroluje zda poslané hodnoty splňuji jednoduché požadavky a chrání heslo solí. <br> Důležitou funkcí PHP je nastavování cookies a session pro udržení komunikace mezi přihlášeným uživatelem a stránkou. Pomocí cookies je nastavená barevná preference uživatele, zda se chce světlý nebo tmavý motiv stránky. Session se starají, aby se nepřihlášený uživatel nedostal k objednávce, čímž by se mohl snažit rozhodit soubor kam se objednávky zapisují. Taky pomocí session dokáže stránka zjistit jaká objednávka patří uživateli a následně ji vykreslí. Nakonec se session starají o odhlášení uživatele a zrušení objednávky přepsaním hodnot v souboru. <br> A v neposlední řadě php spolu s JS kontrolují správnost vyplnění formulářů. Konkrétně php kontroluje správnou délku jména a hesla a zda email obsahuje zavináč. Následně v případě nesprávného vyplnění vrací formulář k doplnění. Přitom nevymaže vyplněné hodnoty a vrátí je zpátky. Plus k tomu vypíše chybové hlášky pod položky, které je třeba opravit. Nevrací hodnoty špatného hesla. To musí uživatel znovu vyplnit.
    </h4>



  </div>

  <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
      <input type="checkbox" id="checkbox" <?php echo $_COOKIE["checked"];?> name="theme" />
      <a class="slider round"></a>
    </label>
  </div>

  <script src="darktheme.js"></script>

</body>

</html>
