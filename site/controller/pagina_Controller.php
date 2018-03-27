<?php

class Pagina {
    #code
    
    public $continut = "";
    
    public function __construct(){
        //return "<h3>Modificari pagini - Administrare</h3>";
    
        $pagini = new PaginaModel();
        $pagina = $pagini->pagina(100);
        $this->continut = $pagini->content;
 
        $pagini->inchideConexiune();
    }
}

$pagina = new Pagina;