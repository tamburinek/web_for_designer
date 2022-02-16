<?php
/*cookies pro přepínání dark modu a light modu*/
if(!isset($_COOKIE["theme"])) {
  setcookie("theme", "dark-theme", time() + 600000000, '/');
}
if(!isset($_COOKIE["checked"])) {
  setcookie("checked", "checked", time() + 600000000, '/');
  header("Location:prudukty.php");
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
  <title> Produkty </title>
  <link rel="stylesheet" href="../css/produkty.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" media="print" href="../css/print.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Love+Ya+Like+A+Sister&family=Satisfy&display=swap" rel="stylesheet">
</head>

<body class="<?php echo $_COOKIE["theme"];?>">
  <header>
    <a href="omne.php" class="logo"> Nicole Design </a>
    <div class="header-right">
      <a href="omne.php">Nicole</a>
      <a class="active" href="produkty.php">Produkty</a>
      <a href="secret.php">Album</a>
      <a href="nakup.php">Objednání</a>
      <a href="prihlaseni.php">Přihlášení</a>
    </div>
  </header>

  <div class="main">
    <div class="broz">
      <h1> Dámská brož </h1>
      <p> <img id="channel" alt="brož" src="../pic/chanel.png"> Chcete, aby váš outfit vypadal svěže? Potřebujete nějaký nevšední doplněk? Pořiďte si brož!!! Ano, právě brož je to, co potřebujete.
        Brože nenosily jen naše babičky. Návrháři brožím v posledních letech navrátily lesk. Brože totiž dokáží oživit i jinak nudné kousky. Připněte si na jednoduchý nezajímavý svetřík originální brož a svetřík okamžitě povýšíte na módní skvost! Vyzkoušejte třeba populární roztomilé šperky s různými motivy, do kterých se nelze nezamilovat. Brože jsou vyrobené z nejkvalitnějších materiálů. Vše je ruční práce a každá brož je unikátní. Vybrat si můžete ze spousty růžných kombinací motivu a barev. Mezi nejoblíbenější tvary patří Chanel, písmenko, motýl, či motiv zvířete. S broží od Nicole Design budete středem pozornosti každé společenské akce a rozjasníte svůj vzhled. Brože nyní nejsou tolik rozšířené, což taky nepomůže Vaší jedinečnosti.
     </p>
    </div>

    <div class="celenka">
      <h1> Dámské čelenky </h1>
      <p> <img id="celenka" alt="celenka" src="../pic/celenky.png"> Momentálně jsou pokrývky hlavy využívány zejména jako ochrana před sluncem nebo mrazem, jsou součástí uniforem a pracovních oděvů, tedy slouží i k bezpečnosti člověka. Ve  státech či krajích s náboženskou vírou nosí pokrývky hlavy, kterou víra předepisuje. Větší využití je všák v módním průmyslu, kdy pokrývka hlavy slouží pouze jako módní doplněk. To platí i pro čelenky, které jsou nádherným doplněním k outfitu. Mimo jiné dodají vašemu oblečení letní vzhled a Vy se budete cítit na vrcholu světa. Různé barevné kombinace zhotoveny přímo pro vás budou součástí každé Vaší vycházky ven. Čelenka je taktéž vyrobena pouze z nejlepších materiálů.
        </p>
    </div>

    <div class="broz">
      <h1> Set brože a čelenky</h1>
      <p> <img id="chanel" alt="set brože a čelenky" src="../pic/1set.png"> Set toho nejlepšího. Objednáním setu brože a čelenky dostanete unikátní sadu dvou dokonalých módních doplňků. Set se vyrábí po komunikaci se zákázníkem, kdy si každý zákázník sám zvolí motiv, tvar a barevnou kombinaci. Každý set je unikátní a dokonale sladěný. Výroba takového setu trvá měsíc, ale je to doba, kterou se vyplatí počkat. Po obdržení setu nedostanete pouze kus módního doplňku, dostanete dokonalý zážitek, který s vámi bude navždy. Touha po kráse je tu s námi už hodně dlouho, ale až teď si můžeme dovolit vyrábět opravdu nádherné kousky. Historie čelenek a broží sahá velmi daleko, tak se i Vy staňte součástí této historie!!!

       </p>
    </div>

    <div class="theme-switch-wrapper">
      <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" name="theme" <?php echo $_COOKIE["checked"];?> />
        <a class="slider round"></a>
      </label>
    </div>







  </div>
  <script src="../js/darktheme.js"></script>
</body>
</html>
