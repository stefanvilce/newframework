<?php


class KontaktView {
	
	public $pageTitle = "Radu Cr, te tocam pana las Mangalia inn pace";
	public $pageKeywords = "Mangalia, primaria, Radu Cristian, primar prost, spagar, politica";
	public $pageDescription = "Siteul care urmareste activitatea primariei si spera sa o faca publica.";
	
	
	public static function continutSubtemplate(){
		$viewK = new Template();
		$viewK->title="Contact";
		//$view->properties['name'] = "Jude";
		$formularContact = $viewK->render('subTEMPLATE_contact.htm');
		return $formularContact;
	}
	
	public static function afisare(){
		$view = new Template();
		$view->continut = self::continutSubtemplate();
		$view->title="Contact";
		$view->formular = formularRezervare();
		echo $view->render('TEMPLATE_GENERAL.htm'); 
	}
	
}

KontaktView::afisare();


   