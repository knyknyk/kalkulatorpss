
<?php
require_once dirname(__FILE__).'/Config.php';

//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/app/calc.php");

//przekazanie żądania do następnego dokumentu ("forward")
include _ROOT_PATH.'/calc.php';
