<?php
/***************************************************************************
 *
 *  Paginatie
 *  (c) 2011, request dot ro
 *
 *
 ***************************************************************************/


class Paginatie{
    
    function pagini_stil($href, $pagina, $pagina_curenta){
        $a = " &nbsp; <a href='$href'>$pagina</a>";
        //$sfarsit = "</a>";
        $b = " &nbsp; &nbsp; $pagina &nbsp; ";
        if(isset($pagina_curenta)) {
            return $b; //daca este pagina curenta, nu returnez link
        } else {
            return $a;
        }
    } //function pagini_stil
    
    function pagini($sql, $pagina_before, $pagina_after, $rez_per_page){
        // $pagina_before este textul din url care este inantea paginii: ex. '&pagina='
        // $pagina_after este textul din url care este inantea paginii: ex. "&"
        // $sql = interogarea care se va sparge a.i. sa se afle nr.total de inregistrari
        // $rez_per_page = cate rezultate se vor afisa pe pagina
        
        //sparg interogarea
        $sqlN = explode("LIMIT", $sql); //
        $s = $sqlN[0]; //noua interogare cu care calculam nr de inregistrari
        $rez = mysql_query($s);
        $nrTotal = mysql_numrows($rez); //nr. total de inregistrari
        $nrPagini = ($nrTotal - 1) / $rez_per_page + 1;
        $nrPagini = (integer)$nrPagini;
        
        //pagina curenta
        $uri = $_SERVER['REQUEST_URI'];
        $u = explode($pagina_before, $uri);
        $uri_start = $u[0];//prima parte a url-ului
        if(count($u)>1){
            if(strlen($pagina_after) > 0){
                    $v = explode($pagina_after, $u[1]);
                    if(count($v) > 1){
                        $pagina_curenta = $v[0]; //am scos pagina curenta
                        if(count($v) > 1) { $uri_end = $v[1]; } else { $uri_end = ""; }
                    }
            } else {
                    $pagina_curenta = $u[1];
                    $uri_end = "";
            }
        } else {
            $pagina_curenta = 1;
            $uri_end = ""; //ultima parte a url-ului
        } //if
        
        
        for($i=1; $i<=$nrPagini; $i++){
            if($i == $pagina_curenta){
                $a = $this->pagini_stil($hrefN, $i, $pagina_curenta);
                echo $a;
            } else {
                $hrefN = $uri_start . $pagina_before . $i . $pagina_after . $uri_end;
                $a = $this->pagini_stil($hrefN, $i);
                echo $a;
            } //if 
        } //for        
        
    } //function pagini()
    
    function interogare($sql, $pagina_before, $pagina_after, $rez_per_page){
         //sparg interogarea
        $sqlN = explode("LIMIT", $sql); //
        $s = $sqlN[0]; //noua interogare cu care calculam nr de inregistrari
        
         //pagina curenta
        $uri = $_SERVER['REQUEST_URI'];
        $u = explode($pagina_before, $uri);
        if(count($u)>1){
            if(strlen($pagina_after) > 0){
                    $v = explode($pagina_after, $u[1]);
                    if(count($v) > 1){
                        $pagina_curenta = $v[0]; //am scos pagina curenta
                    } 
            } else {
                    $pagina_curenta = $u[1];
            }
        } else {
            $pagina_curenta = 1;
        } //if
        
        $start_inregistrare = ($pagina_curenta - 1) * $rez_per_page;
        
        $s = $s . " LIMIT $start_inregistrare, $rez_per_page ";
         
        return $s;
    } //function interogare()
    
} //end class Paginatie

$pag = new Paginatie();
?>