<?php

$lang = $_GET['lang'];

if($lang == 'en'){
    $_SESSION['cur_lang'] = "en";
    $_SESSION['lang'] = "en";
} elseif($lang == 'it') {
    $_SESSION['cur_lang'] = "it";
    $_SESSION['lang'] = "it";
}
else {
    $_SESSION['cur_lang'] = "ro";
    $_SESSION['lang'] = "ro";
}

header("location: ".$_SERVER['HTTP_REFERER']."");

?>