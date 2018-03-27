<?php
class Autentificare {
    #code
    
    public $textul;
    public $textSus = "";	// asta este textul care se completeaza cand este un succes autentificarea
	public $textJos = "";	// asta este textul care se completeaza cand autentificarea esueaza
    
    public function __construct(){
        $this->textul = "";
        if(!isset($_SESSION['logat'])){
            if(isset($_POST['trimite_autentificare'])){
                $this->autentific();
            }            
        } elseif($_SESSION['logat'] != 1){
            if(isset($_POST['trimite_autentificare'])){
                $this->autentific();
            } else {
                $this->textJos = $this->mesajEroare();
            }
        } else {
            if(isset($_GET['logout'])){
                // aici fac logoutul
                $this->logout();
            } else{
                $this->textSus = $this->mesajulAutentificat();
            }
        }
    } //construct
    
   
    private function mesajulAutentificat(){
        $x = "Esti autentificat, <strong>" . $_SESSION['username'] . "</strong>! <meta http-equiv='refresh' content='1;URL=?p=home' />";	
        return $x;		
    }
	
	private function mesajEroare(){
		$x = "<div style='border: 1px dashed #FD4545; padding: 20px; color: #981212;'> <h3>Autentificare nereusita!</h3>Incearca din nou! </div>";
		return $x;
	}
    
    public function autentific(){
         $conexiune = new Conexiune();
         $c = $conexiune->redaConexiune();
         $x = " . . . Autentificare . . . <br />";
         $utilizator = addslashes($_POST['username']);
         $parola = addslashes($_POST['password']);
         
         $sql = 'SELECT * FROM `users` WHERE `username`="'.$utilizator.'" AND `password`="'.md5($parola).'"';
         $stmt = $c->query($sql);  
            $j = $stmt->rowCount();		// OR print_r($stmt->errorInfo()); // errorInfo este nenecesar aici
            if($j == 1){
                    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $id         = $r[0]["id"];
                    $username   = stripslashes($r[0]["username"]);
                    $admin      = stripslashes($r[0]["tip"]);
                    
                    $_SESSION['logat'] = 1;
					$_SESSION['username'] = $username;
					$_SESSION['username_id'] = $id; //id-ul celui logat
					$_SESSION['admin'] = $admin;    // ce tip de administrator este... nu cred ca o folosesc...
                    
                    $this->textSus = $this->mesajulAutentificat();                                       
            } else {
                    $x = "";
                    $x = $x . $this->mesajEroare();         
                    $this->textJos = $x;            
            } 
    }
    
    
    public function logout(){
            session_unset();
            session_destroy();            
            $this->textul = "<h2>Log Out</h2><p>Esti delogat</p><meta http-equiv='refresh' content='5;URL=?p=autentificare' />";
    }
}
