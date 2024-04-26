<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';
$kwota = isset($_POST['kwota']) ? $_POST['kwota'] : '';
$lata = isset($_POST['lata']) ? $_POST['lata'] : '';
$oprocentowanie = isset($_POST['oprocentowanie']) ? $_POST['oprocentowanie'] : '';
if (!isset($kwota) || !isset($lata) || !isset($oprocentowanie)) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ($kwota == "") {
    $messages[] = 'Nie podano kwoty';
}
if ($lata == "") {
    $messages[] = 'Nie podano lat';
}
if ($oprocentowanie == "") {
    $messages[] = 'Nie podano oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty($messages)) {

    // sprawdzenie, czy $kwota i $lata są liczbami całkowitymi
    if (!is_numeric($kwota)) {
        $messages[] = 'Kwota nie jest liczbą całkowitą';
    }
    if (!is_numeric($lata)) {
        $messages[] = 'Lata nie są liczbą całkowitą';
    }
    if (!is_numeric($oprocentowanie)) {
        $messages[] = 'Oprocentowanie nie jest liczbą całkowitą';
    }
}
if (empty($messages)) { // gdy brak błędów

    //konwersja parametrów na int
    $kwota = intval($kwota);
    $lata = intval($lata);
    $oprocentowanie = intval($oprocentowanie);

    //wykonanie operacji
    $result = ($kwota + $kwota * $oprocentowanie / 100) / ($lata * 12);
}

$smarty = new Smarty();
$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','3');
$smarty->assign('page_description','Szablonowanie Smarty ');
$smarty->assign('page_header','Smarty');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('messages',$messages);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');
