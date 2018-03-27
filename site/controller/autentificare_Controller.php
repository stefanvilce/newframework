<?php
class Autentificare {
    #code
    
    public $textul;
    
    public function __construct(){
        $this->textul = "";
        if(!isset($_SESSION['logat'])){
            if(isset($_POST['trimite_autentificare'])){
                $this->autentific();
            } else {
                $this->textul = $this->formularul();
            }            
        } elseif($_SESSION['logat'] != 1){
            if(isset($_POST['trimite_autentificare'])){
                $this->autentific();
            } else {
                $this->textul = $this->formularul();
            }
        } else {
            if(isset($_GET['logout'])){
                // aici fac logoutul
                $this->logout();
            } else{
                $this->textul = $this->mesajulAutentificat();
            }
        }
    } //construct
    
    private function formularul(){
        
        $x = "<div style='font-size: 14px; color: #676767; text-align: left; border: 1px solid #DCDCDF; border-radius: 4px; box-shadow: 1px 0 0 #EDEDEF; padding: 20px;'>";
        $x = $x . "<form action=''  method='post'> <h3>&nbsp; </h3>";
        $x = $x . "Utilizator: <input type='text' name='utilizator' style='margin-bottom: 16px;display: block; width: 99%; padding: 2px; font-size: 14px; border: 1px solid #F4F4F9;' />";
        $x = $x . "Parola: <input type='password' name='parola' style='display: block; width: 99%; padding: 2px; font-size: 14px; border: 1px solid #F4F4F9;' />";
        $x = $x . "<input type='submit' name='trimite_autentificare' value='Autentifica-te!' style='display: block; width: 100%; border-radius: 3px; border: 1px solid #F4F4F9; padding: 3px; margin-top: 20px; font-size: 16px;' />";
        $x = $x . "</form></div>";
        
        return $x;
    }
    
    private function mesajulAutentificat(){
        return "Gata! Sunt autentificat";
    }
    
    public function autentific(){
         $conexiune = new Conexiune();
         $c = $conexiune->redaConexiune();
         $x = " . . . Autentificare . . . <br />";
         $utilizator = addslashes($_POST['utilizator']);
         $parola = addslashes($_POST['parola']);
         
         $sql = 'SELECT * FROM `users` WHERE `username`="'.$utilizator.'" AND `password`="'.md5($parola).'"';
         $stmt = $c->query($sql);  
            $j = $stmt->rowCount() OR print_r($stmt->errorInfo());
            if($j == 1){
                    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($r);
                    $id         = $r[0]["id"];
                    $username   = stripslashes($r[0]["username"]);
                    $admin      = stripslashes($r[0]["tip"]);
                    
                        $_SESSION['logat'] = 1;
			$_SESSION['username'] = $username;
			$_SESSION['username_id'] = $id; //id-ul celui logat
			$_SESSION['admin'] = $admin;    // ce tip de administrator este... nu cred ca o folosesc...
                    
                    
                    $x = "
                    
                    <!-- Message OK -->
			
			<p><strong>Autentificare reu&#351;it&#259;!</strong></p>
			
			<!-- End Message OK -->
			<p style='height: 500px;'> &nbsp; </p>
			<meta http-equiv='refresh' content='3;URL=?p=home' />
                    
                    ";                    
            } else {
                    $x = "Error.... /////////,<br>".$sql."<br />";
                    //print_r($stmt->errorInfo());
                    //$x = "";
                    $x = $x . "<div style='padding: 40px;'>Utilizatorul nu a fost gasit in baza de date.</div>";
                    $x = $x . $this->formularul();                    
            }
            $this->textul = $x;  
    }
    
    
    public function logout(){
            session_unset();
            session_destroy();
            
            $this->textul = "<h2>Log Out</h2><p>Esti delogat</p><meta http-equiv='refresh' content='3;URL=?p=autentificare' />";
    }
    

}

$autentificare = new Autentificare;
