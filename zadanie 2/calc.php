
<?php
require_once dirname(__FILE__) . '/Config.php';

// KONTROLER strony kalkulatora

// W kontrolerze nie wysyła się niczego do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// Ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH . '/check.php';

// Pobranie parametrów
function getParams(&$kwota, &$lata, &$oprocentowanie)
{
    $kwota = $_REQUEST['kwota'] ?? null;
    $lata = $_REQUEST['lata'] ?? null;
    $oprocentowanie = $_REQUEST['$oprocentowanie'] ?? null;
}

// Walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota, &$lata, &$oprocentowanie, &$messages)
{
    // Sprawdzenie, czy parametry zostały przekazane
    if (!($kwota && $lata && $oprocentowanie)) {
        // Sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
        // Teraz zakładamy, że nie jest to błąd. Po prostu nie wykonamy obliczeń
        return false;
    }

    // Sprawdzenie, czy potrzebne wartości zostały przekazane
    if ($kwota == "") {
        $messages[] = 'Nie podano kwoty';
    }
    if ($lata == "") {
        $messages[] = 'Nie podano lat';
    }
    if ($oprocentowanie == "") {
        $messages[] = 'Nie podano oprocentowania';
    }

    // Nie ma sensu walidować dalej gdy brak parametrów
    if ($messages) {
        return false;
    }

    // Sprawdzenie, czy $kwota i $lata są liczbami całkowitymi
    if (!is_numeric($kwota)) {
        $messages[] = 'Kwota nie jest liczbą całkowitą';
    }

    if (!is_numeric($lata)) {
        $messages[] = 'Lata nie są liczbą całkowitą';
    }

    if (!is_numeric($oprocentowanie)) {
        $messages[] = 'Oprocentowanie nie jest liczbą całkowitą';
    }

    return empty($messages);
}

function process(&$kwota, &$lata, &$oprocentowanie, &$messages, &$result, $role)
{
    // Konwersja parametrów na int
    $kwota = intval($kwota);
    $lata = intval($lata);
    $oprocentowanie = intval($oprocentowanie);

    // Wykonanie operacji
    if ($role === 'admin') {
        $result = ($kwota * pow((1 + $oprocentowanie / 100), $lata)) / (12 * $lata);
    } else {
        $messages[] = 'Tylko administrator może wyliczać';
    }
}

// Definicja zmiennych kontrolera
$kwota = $lata = $oprocentowanie = $result = null;
$messages = [];

// Pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota, $lata, $oprocentowanie);
if (validate($kwota, $lata, $oprocentowanie, $messages)) {
    process($kwota, $lata, $oprocentowanie, $messages, $result, $role);
}

include 'calcview.php';
