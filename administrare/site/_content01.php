<?php

//  https://softwareengineering.stackexchange.com/questions/159529/how-to-structure-template-system-using-plain-php
//	Aici trebuie sa verific eu daca pot instala un template

class Content01{
		//aceasta este clasa care imi aduna toate astea intr-o
		
		public $pagina;
		
		public function __construct($p){
			$this->p($p);
			if(!isset($_SESSION['logat'])){  // aici se face redirecarea si nu mai este nevoie de ce se intampla mai jos
				$this->pagina = "autentificare";
			}
			$model 		= MODEL . DS . $this->pagina . '_Model.php';
			$controller = CONTROLLER . DS . $this->pagina . '_Controller.php';
			$viewer 	= VIEW . DS . $this->pagina . '_View.php';						
			
			
			if(file_exists($model)){
				include($model);
			}
			if(file_exists($controller)){
				include($controller);
			}
			if(file_exists($viewer)){
				include($viewer);		// ca sa pot trece peste cazul in care nu am fisierul asta 
			}
		}
		
		private function p($p){
			$this->pagina = $p;	// care este de fapt $_GET['p']
			// daca nu este autentificat, redirectionez catre formularul de autentificare
			
			
			// nu mai este nevoie de if-urile astea pentru ca redirectarea s-a facut mai sus in pagina asta
			//   la linia 13 - 14
			/*
			if(!isset($_SESSION['logat'])){
				if($p != 'autentificare' && $p != 'logout'){
					//echo "<META http-equiv='refresh' content=\"0;URL=".APP_ROOT."/administrare/?p=autentificare\">";
					echo "APP_ROOT este " . APP_ROOT;
				}
			} elseif($_SESSION['logat'] != 1){
				if($p != 'autentificare' && $p != 'logout'){
					//echo "<META http-equiv='refresh' content=\"0;URL=".APP_ROOT."/administrare/?p=autentificare\">";
                    echo "APP_ROOT este " . APP_ROOT;
				}
			} */
		}
}

$content01 = new Content01($p);		//	am initializat si clasa aici. Deci, gata!
	
?>