
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
    <a href="<?php print(_APP_ROOT); ?>/strona_chroniona.php" class="pure-button">kolejna chroniona strona</a>
    <a href="<?php print(_APP_ROOT); ?>/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/calc.php" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator</legend>
    <fieldset>
        <label for="id_kwota">Kwota: </label>
        <input id="id_kwota" type="text" name="kwota" value="<?= $kwota ?>" />
        <label for="id_lata">Na ile lat: </label>
        <input id="id_lata" type="text" name="lata" value="<?= $lata ?>" />
        <label for="id_oprocentowanie">Oprocentowanie: </label>
        <input id="id_oprocentowanie" type="text" name="$oprocentowanie" value="<?= $oprocentowanie ?>" />
    </fieldset>    
    <input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form> 

<?php
// Wyświetlenie listy błędów, jeśli istnieją
if (isset($messages)) {
    if (count($messages) > 0) {
        echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
        foreach ($messages as $key => $msg) {
            echo '<li>' . $msg . '</li>';
        }
        echo '</ol>';
    }
}
?>

<?php if (isset($result)) { ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #f0f0f0; width:15em;">
<?= 'wynik: ' . round($result, 2) . "zł"; ?>
</div>
<?php } ?>

</div>

</body>
</html>
