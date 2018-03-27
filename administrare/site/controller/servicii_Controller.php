<?php

class Servicii {
    #code
    
    public $continut = "";
    
    public function __construct(){
        //return "<h3>Modificari pagini - Administrare</h3>";
    
        $pagini = new ClasePagini();
        $pagina = $pagini->pagina(100);
        $this->continut = $pagini->content;
 
        $pagini->inchideConexiune();
    }
}

$servicii = new Servicii;