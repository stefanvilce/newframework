<?php     

class AutentificareView {
	
	public static $pageTitle = "Autentificare";
	public static $pageKeywords = "Autentificare, administrare";
	public static $pageDescription = "Autentificare, administrare site.";
	
	public static function afisare(){
		$autentificare = new Autentificare;
		$view = new Template();
		$view->pageTitle = self::$pageTitle;
		$view->pageKeywords = self::$pageKeywords;
		$view->pageDescription = self::$pageDescription;
		
		$view->title="Autentificare";
		
		$view->textSus = $autentificare->textSus;
		$view->textJos = $autentificare->textJos;
		if(strlen($autentificare->textSus) > 3){
			//daca este mesaj atunci afisez mesajul
			$viewTextSus = new Template();
			$viewTextSus->title = "Autentificare reu&#351;it&#259;";
			$viewTextSus->mesaj = $autentificare->textSus;
			$view->textSus = $viewTextSus->render('fragments/login_success.htm');
		}
		if(strlen($autentificare->textJos) > 3){
			//daca este mesaj atunci afisez mesajul
			$viewTextJos = new Template();
			$viewTextJos->title = "Autentificare nereu&#351;it&#259;";
			$viewTextJos->mesaj = "Mai incearca o data. Autentificarea este nereusita. <br />" . $autentificare->textJos;
			$view->textJos = $viewTextJos->render('fragments/login_fail.htm');
		}
		
		$view->properties['name'] = "Jude";
		echo $view->render('login.html'); 
	}
	
}

AutentificareView::afisare();