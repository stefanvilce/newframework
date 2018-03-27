<?php
class Common{
    private $properties;
    public $pagina = "home";
    
    public function __construct($p){
        $this->pagina = $p;
        include('common/conectare.php');
        include('common/functii.php');
        include('common/class_Template.php');
        
        // the most important in the page
        include('site/_content01.php');
        // the most important in the page END
    }
}
