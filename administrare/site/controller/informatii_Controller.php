<?php

class Informatii {
    #code
    
    public $continut = "";
    
    public function __construct(){
        //return "<h3>Modificari pagini - Administrare</h3>";
    
        $pagini = new ClasePagini();
        $pagina = $pagini->pagina(101);
        $this->continut = $pagini->content;
 
        $pagini->inchideConexiune();
    }
}

$informatii = new Informatii;