<?php

if(isset($_POST['actiune'])){
    if($_POST['actiune']=='modifica'){
        $ajax_home->modifica($_POST['idPagina'], addslashes($_POST['txtul']));
    } else {
        //aici doar afiseaza
        echo $ajax_home->afiseaza($_POST['idPagina']);
    }
}