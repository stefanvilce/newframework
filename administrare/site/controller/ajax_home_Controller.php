<?php
class Ajax_home {
    
    public $t = "";      //acesta este textul care se afiseaza
    public $paginiId;
    public $limba;
    var $c;
    var $conexiune;
    
    
    function __construct(){
            $conexiune = new Conexiune();
            $this->c = $conexiune->redaConexiune();
            $this->conexiune = $conexiune;
            $this->lang = $_SESSION['cur_lang'];            
    }
    
    public function inchideConexiune(){
            $this->c = null;
            $this->conexiune->closeDB();
    }

    
    
    public function modifica($paginiId, $txtul){
        
            $c = $this->c;            
            $limba = $_SESSION['cur_lang'];
            
            $sql = "UPDATE pagini_content SET content = :content WHERE pagini_id= :paginiId AND lang= :limba LIMIT 1";
            $stmt = $c->prepare($sql);
            if (!$stmt) {
                echo "\nPDO::errorInfo():\n";
                print_r($c->errorInfo());
            }
            $stmt->bindParam(':content', $txtul, PDO::PARAM_STR);       
            $stmt->bindParam(':paginiId', $paginiId, PDO::PARAM_INT);    
            $stmt->bindParam(':limba', $limba, PDO::PARAM_STR);
            // use PARAM_STR although a number  
            $stmt->execute();
            
            //inchid BD
            $this->inchideConexiune();
            
    }
    
    public function afiseaza($paginiId){
        $t = "Gata! A fost salvat";
        $this->t = $t;
        $this->limba = $_SESSION['cur_lang'];
        
         $sql = 'SELECT * FROM `pagini_content` WHERE `pagini_id`='.$paginiId.' AND `lang`="'.$this->limba.'"';
            $c = $this->c;
            $stmt = $c->query($sql);  
            $j = $stmt->rowCount();
            if($j > 0){
                    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($r);
                    $this->t  = stripslashes($r[0]["content"]);
            } else {
                    echo "Error.... /////////,<br>".$sql;
                    
            }
            return $this->t;
    }
    
}

$ajax_home = new Ajax_home;
