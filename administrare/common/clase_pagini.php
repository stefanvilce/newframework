<?php
/**************************************************************************************
 *
 *          Clasa care se ocupa de preluarea continutului unei pagini
 *
 *
 **************************************************************************************/

class ClasePagini {
        #code
        var $id;
        var $pagini_id;
        var $titlu;
        var $subtitlu;
        var $content;
        var $lang;
        var $c;         // asta este conexiunea la baza de date
        
        function __construct(){
            $conexiune = new Conexiune();
            $this->c = $conexiune->redaConexiune();
            $this->lang = $_SESSION['cur_lang'];
            
        }
        public function inchideConexiune(){
            $this->c = null;
        }
        
        public function pagina($pagini_id){
            //preia datele din baza de date
            $this->pagini_id = $pagini_id;
            
            //$conexiune = new Conexiune();
            //$c = $conexiune->redaConexiune();            
            $sql = 'SELECT * FROM `pagini_content` WHERE `pagini_id`='.$pagini_id.' AND `lang`="'.$this->lang.'"';
            $c = $this->c;
            $stmt = $c->query($sql);  
            $j = $stmt->rowCount();
            if($j > 0){
                    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($r);
                    $this->id       = $r[0]["id"];
                    $this->titlu    = stripslashes($r[0]["titlu"]);
                    $this->subtitlu = stripslashes($r[0]["subtitlu"]);
                    $this->content  = stripslashes($r[0]["content"]);
            } else {
                    echo "Error.... /////////,<br>".$sql;
                    
            }
            //$this->inchideConexiune();
        } 
}




?>