<?php

class Desprenoi {
    #code
    
    public $continut = "";
    
    public function __construct(){
        //return "<h3>Modificari pagini - Administrare</h3>";
    
        $pagini = new ClasePagini();
        $pagina = $pagini->pagina(99);
        $this->continut = $pagini->content;
 
        $pagini->inchideConexiune();
    }
}

$desprenoi = new Desprenoi;
