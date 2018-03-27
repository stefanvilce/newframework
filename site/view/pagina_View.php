<?php
     


class PaginaView {
	
	public $pageTitle = "Radu Cr, te tocam pana las Mangalia inn pace";
	public $pageKeywords = "Mangalia, primaria, Radu Cristian, primar prost, spagar, politica";
	public $pageDescription = "Siteul care urmareste activitatea primariei si spera sa o faca publica.";
	
	public static function afisare(){
		$pag = new Pagina();
		$view = new Template();
		$view->title="Aceasta este prima pagina de test";
		$view->properties['name'] = "Jude";
		$view->continut = $pag->continut;
		$view->formular = formularRezervare();
		echo $view->render('TEMPLATE_GENERAL.htm'); 
	}
	
}

PaginaView::afisare();