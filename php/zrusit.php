<?php
/*zahájení session*/
session_start();
/*přepis v objednávce čímž se uživateli nebude nadále ukazovat*/
$ig = $_SESSION["login_user"];
/*funkce na přepis jmena*/
function replace_string_in_file($filename, $string_to_replace, $replace_with){
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
}
/*nastavení hodnoty jmeno na hodnotu kterou nikdo nemůže mít jako uživatelske jmeno*/
$filename="nakupy.json";
$string_to_replace = $ig;
$replace_with="právěbylosmazánobohužel";
replace_string_in_file($filename, $string_to_replace, $replace_with);

$filename="komenty.json";
$string_to_replace = $ig;
$replace_with="právěbylosmazánobohužel";
replace_string_in_file($filename, $string_to_replace, $replace_with);

/*zrušeni session a přesměrování*/
unset($_SESSION['ig']);
header("Location: nakup.php");
?>
