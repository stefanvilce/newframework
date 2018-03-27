<?php
/*************************************************************************
 * 
 * 		@author... eu
 *              20 dec. 2010
 * 
 ***************************************************************************/

class Utilizator {
	
	function VerifUtil($id){
                    $util = $_SESSION['log']['utilizator'];
                    $idUtil = $_SESSION['log']['id'];
                    if($id == $idUtil){
                        return 1; //asta inseamna ca utilizatorul logat este chiar administratorul contului, si are voie sa faca modificari.
                    } else {
                        return 0; 
                    }
        } //function VerifUtil()
	
        
        
        function LOGin(){
                    echo  "test";
        } //aici vad ce e de facut
        
        
        
        function LOGout() {
                    unset($_SESSION['log']);
                    echo " Log out . . . ";
                    echo "<meta http-equiv=\"refresh\" content=\"3; ".$_SERVER['HTTP_REFERER']."\" />";
            
        } //END function LOGout();
        
        
        /**********************************************************
         * Verific daca exista utilizatorul asta in baza de date
         * ca sa nu existe 2 utilizatori cu acelasi user
         * 
         **********************************************************/
        function verifExistentaUtilizator($utilizator){
            $sql = "SELECT `id`, `utilizator` FROM `0_clean_utilizatori` WHERE `utilizator`='$utilizator'";
            $rez = mysql_query($sql);
            $nr = mysql_numrows($rez);
            if($nr > 0){
                $test = 1;
            } else {
                $test = 0;
            }
            return $test;// in functie de existenta acestui utilizator se face sau nu, noul utilizator
        }
        
        
        
        function SalvareDateGenerale($id){
                    
                    $a = implode('#', $_POST['tip_companie']);
                    $tip_companie = "'#".xss_clean($a)."'";
                    $nume_companie = $this->scot_SC_ul(xss_clean($_POST['nume_companie'])); //am scos SC-ul din fata
                    $nume_companie = "'".addslashes($nume_companie)."'";
                    $adresa = "'".xss_clean($_POST['adresa'])."'";
                    $localitate = "'".xss_clean($_POST['localitate'])."'";
                    $judet = "'".xss_clean($_POST['judet'])."'";
                    $tara = "'".xss_clean($_POST['tara'])."'";
                    $telefon = "'".xss_clean($_POST['telefon'])."'";
                    $mobil = "'".xss_clean($_POST['mobil'])."'";
                    $email = "'".xss_clean($_POST['email'])."'";
                    $fax = "'".xss_clean($_POST['fax'])."'";
                    $web = "'".xss_clean($_POST['web'])."'";
                    $CUI = "'".xss_clean($_POST['CUI'])."'";
                    $J = "'".xss_clean($_POST['J'])."'";
                    $id = (integer)$_POST['id'];
                    
                    $test = 1; $_SESSION[v][error] = '';
    
                    if(strlen($adresa)<7) { $test = 0; $_SESSION[v][error] .= '<br /><b>Atentie!</b> Adresa nu a fost completata!'; }
                    if(strlen($localitate)<7) { $test = 0; $_SESSION[v][error] .= '<br /><b>Atentie!</b> Completeaza localitatea!'; }
                    if(strlen($judet)<4) { $test = 0; $_SESSION[v][error] .= '<br /><b>Atentie!</b> Completeaza judetul!'; }
                    if(strlen($tara)<5) { $test = 0; $_SESSION[v][error] .= '<br /><b>Atentie!</b> Completeaza tara!'; }
                    if(!validate_email($_POST['email'])) { $test = 0; $_SESSION[v][error] .= '<br /><b>Atentie!</b> Adresa de e-mail invalida<br />'; }
                    
                    if($test == 1){
                            $sqlSalvez = "UPDATE `0_clean_utilizatori` SET
                                            `nume_companie`=$nume_companie,
                                            `tip_companie`=$tip_companie,
                                            `adresa`=$adresa,
                                            `localitate`=$localitate,
                                            `judet`=$judet,
                                            `tara`=$tara,
                                            `telefon`=$telefon,
                                            `mobil`=$mobil,
                                            `fax`=$fax,
                                            `email`=$email,
                                            `web`=$web,
                                            `CUI`=$CUI,
                                            `J`=$J
                                            WHERE `id`=$id";
                            $rez = mysql_query($sqlSalvez) OR die(mysql_error()."<br />".$sqlSalvez);
                    }//if
                    else {
                        echo "<div class='eroare'>".$_SESSION['v']['error']."</div>";
                    }
                    if($rez) {
                        unset($_SESSION[v][error]);
                        
                        //trebuie sa modific si in tabela 0_clean_companii
                        $sql_3 = "UPDATE `0_clean_companii` SET  `nume_companie`=$nume_companie WHERE `utilizatori_id`=$id";
                        mysql_query($sql_3);
                        
                        //incarc logo-ul
                        $image=$_FILES['logo']['name']; 
                                //if it is not empty 			    
                                //echo $image."<br>".$parametri;
                        if ($image){
                            $this->incarcaLogo($id, 'logo');
                        }
                        
                        $msg = "<div class='mesaj'>Modific&#259;rile au fost efectuate cu succes!</div>";
                        $msg .= '<meta http-equiv="refresh" content="3; /index.php?p=companie&id='.$id.'" />';
                        echo $msg;
                    } //if rez
                    
        } //function SalvareDateGenerale()
        
        function incarcaLogo($id, $poza){
					$locatie = "utilizatori/logo";
					//$parametri este un sir de forma $w#$h#$aliniere#$pozitia
					 					
 					//get the original name of the file from the clients machine
 					$filename = stripslashes($_FILES[$poza]['name']);
 					//get the extension of the file in a lower case format
  					$extension = strtolower($this->getExtension($filename));
  					 	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 							{
								//print error message
 								$mesaj = $mesaj."<br>Fisierul imagine trebuie sa fie .jpg, sau .gif, sau .png <br /> ";
 							} else {
 								$numeimagine = $poza."_".$id; //get the name of picture from id of company and imagine1, imagine2 etc. -> cu numele construit asa, pot face si suprascrierea imaginilor, fa a mai fi nevoie sa le sterg pe cele vechi
                                                                $newname = "./upload/".$locatie."/".$numeimagine.".".$extension;
 								$copied = copy($_FILES[$poza]['tmp_name'], $newname);
 								$fisier = $numeimagine . "." . $extension;
 								//echo $copied;
 								
 								if(!$copied){
 									$mesaj = $mesaj."<br /> <br />Fisierul <i>".$fisier."</i> nu a fost urcat pe server!";
 									//$imagine = "";
 								}  else {
 									//salvez numele fisierului in baza de date
                                                                                $sql_fisier = "UPDATE `0_clean_utilizatori` SET `$poza`='".$fisier."' WHERE `id` = $id";
                                                                                $rez_fisier = mysql_query($sql_fisier);
 									
 										//aici ar trebui sa vina si o mica functie de sters poza veche; dar vad maine
 										
										if(!($rez_fisier)) {
												echo $sql_fisier;
												echo "<p> &nbsp; </p>";
												echo "Eroare la incarcarea imaginii!";
												echo "<p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p>";
										} 									
 								} //if $copied
 							} //if
	} //end function incarcaLogo()
        
        
        //FUNCTII pentru partea de descriere/editare/salvare descriere
        function AfisareDescriere($id){
                    // $id = id-ul utilizatorului(companiei)
                    $id = (integer)$id;
                    $sql = "SELECT `0_clean_utilizatori`.`id`, `0_clean_utilizatori`.`logo`, `0_clean_companii`.* FROM `0_clean_utilizatori`, `0_clean_companii`
                            WHERE `0_clean_utilizatori`.`id` = `0_clean_companii`.`utilizatori_id` AND `0_clean_companii`.`utilizatori_id`=$id";
                    $rez = mysql_query($sql);
                    $rnd = mysql_fetch_array($rez);
                    
                    $nume_companie = stripslashes($rnd['nume_companie']);
                    $descriere_scurta = stripslashes(nl2br(strip_tags($rnd['descriere_scurta'])));
                    $descriere = stripslashes($rnd['descriere']);
                    $youtube_ = $rnd['linkyoutube'];
                    //imaginile
                    $logo = "/upload/utilizatori/logo/".$rnd['logo'];
                    $img1 = "/upload/utilizatori/imagini/".$rnd['imagine1'];
                    $img2 = "/upload/utilizatori/imagini/".$rnd['imagine2'];
                    $img3 = "/upload/utilizatori/imagini/".$rnd['imagine3'];
                    $img4 = "/upload/utilizatori/imagini/".$rnd['imagine4'];
                    $img5 = "/upload/utilizatori/imagini/".$rnd['imagine5'];
                    
                    ?>
                        &nbsp;
                        <div class='descriere'>
                        <p  class='separator'>Scurt&#259; descriere:</p>
                        <div class='descriere-in'>
                            <?php if(strlen($logo)>28) echo "<img src='".$logo."' class='rightalign' width='100' />";  ?>
                            <?=$descriere_scurta?>
                            </div>
                        
                        
                        
                        <p  class='separator'>Descriere:</p>
                        <div class='descriere-in'><?=$descriere?></div>
                        
                        <p  class='separator'>Imagini:</p>
                        <div class='descriere-in'>
                        <?php 
                        if(strlen($rnd['imagine1'])>4) {
                            echo "<div class='imagine-cu-delete'>";
                            echo "<img src='$img1' />";
                            echo "<a href='?p=companie&sectiune=sterge&img=".$rnd['imagine1']."&id=$id&imaginex=imagine1' title='Sterge imaginea'>Sterge imagine</a>";
                            echo "</div>";
                        }
                        if(strlen($rnd['imagine2'])>4) {
                            echo "<div class='imagine-cu-delete'>";
                            echo "<img src='$img2' />";
                            echo "<a href='?p=companie&sectiune=sterge&img=".$rnd['imagine2']."&id=$id&imaginex=imagine2' title='Sterge imaginea'>Sterge imagine</a>";
                            echo "</div>";
                        }
                        if(strlen($rnd['imagine3'])>4) {
                            echo "<div class='imagine-cu-delete'>";
                            echo "<img src='$img3' />";
                            echo "<a href='?p=companie&sectiune=sterge&img=".$rnd['imagine3']."&id=$id&imaginex=imagine3' title='Sterge imaginea'>Sterge imagine</a>";
                            echo "</div>";
                        }
                        if(strlen($rnd['imagine4'])>4) {
                            echo "<div class='imagine-cu-delete'>";
                            echo "<img src='$img4' />";
                            echo "<a href='?p=companie&sectiune=sterge&img=".$rnd['imagine4']."&id=$id&imaginex=imagine4' title='Sterge imaginea'>Sterge imagine</a>";
                            echo "</div>";
                        }
                        if(strlen($rnd['imagine5'])>4) {
                            echo "<div class='imagine-cu-delete'>";
                            echo "<img src='$img5' />";
                            echo "<a href='?p=companie&sectiune=sterge&img=".$rnd['imagine5']."&id=$id&imaginex=imagine5' title='Sterge imaginea'>Sterge imagine</a>";
                            echo "</div>";
                        }
                        ?>
                        </div>
                        <div class='clar'> &nbsp; </div>
                        <p class='separator'>Youtube:</p><!-- codul Youtube -->
                        <div align='center'><?=$youtube_?></div>
                        
                        <p> &nbsp; </p>
                        
                        <a href='<?=$lnk?>?p=companie&sectiune=descr&formular=1&id=<?=$id?>' class='submit' title='Modific&#259; descriere, scurta descriere, imagini companie'>Modific&#259; descriere companie</a>
                        <br /> &nbsp;
                        </div>
                    <?php
        } //function AfisareDescriere()
        
        
        
        function FormDescriere($id)
        { //formularul de modificare a descreierii unei societati
                    // $id = id-ul utilizatorului(companiei)
                    $id = (integer)$id;
                    $sql = "SELECT `0_clean_utilizatori`.`id`, `0_clean_utilizatori`.`logo`, `0_clean_companii`.* FROM `0_clean_utilizatori`, `0_clean_companii`
                            WHERE `0_clean_utilizatori`.`id` = `0_clean_companii`.`utilizatori_id` AND `0_clean_companii`.`utilizatori_id`=$id";
                    $rez = mysql_query($sql);
                    $rnd = mysql_fetch_array($rez);
                    
                    $nume_companie = stripslashes($rnd['nume_companie']);
                    $descriere_scurta = stripslashes(nl2br(strip_tags($rnd['descriere_scurta'])));
                    $descriere = stripslashes($rnd['descriere']);
                    $youtube_ = $rnd['youtube_'];
                    //imaginile
                    $logo = "/upload/utilizatori/logo/".$rnd['logo'];
                    $img1 = "/upload/utilizatori/imagini/".$rnd['imagine1'];
                    $img2 = "/upload/utilizatori/imagini/".$rnd['imagine2'];
                    $img3 = "/upload/utilizatori/imagini/".$rnd['imagine3'];
                    $img4 = "/upload/utilizatori/imagini/".$rnd['imagine4'];
                    $img5 = "/upload/utilizatori/imagini/".$rnd['imagine5'];
                    ?>
                    <form name='formular_descriere' class='formular_descriere' action ='' method='post' enctype="multipart/form-data">
                        <h3>Modificare descriere</h3> 
                        <!-- scriptul pentru editare descriere -->    
                        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
                        //<![CDATA[
                          bkLib.onDomLoaded(function() {
                                new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('descriere');
                          });
                          //]]>
                        </script>
                        
                        &nbsp;
                        Scurt&#259; descriere:<br />
                        <textarea name='descriere_scurta' maxlength='144' /><?=$descriere_scurta?></textarea><br /> &nbsp;
                        
                        <input type='hidden' name='id' value='<?=$rnd['id']?>' />
                        <br />
                        Descriere:<br />
                        <textarea name="descriere" id='descriere' style="width: 100%;"><?=$descriere?></textarea> <br /> &nbsp;
                        
                        <br />
                        Imagini: <br />
                        <input  type='file' name='imagine1' /><br />
                        <input  type='file' name='imagine2' /><br />
                        <input  type='file' name='imagine3' /><br />
                        <input  type='file' name='imagine4' /><br />
                        <input  type='file' name='imagine5' /><br />
                        &nbsp;
                        
                        <br />
                        Filmul de prezentare (Youtube etc.): 
                        <textarea name='linkyoutube'><?=$youtube_?></textarea><br /> &nbsp;
                        
                        <input type='submit' class='submit' name='salveaza' value='Salveaza' />
                        
                    </form><!-- formular descriere -->
                    <?php
        } //function FormDescriere()
        
        
        
        function SalveazaDescriere($id){
                    //incerc salvarea datelor din formular
                    $id = (integer)$id;
                    $descriere_scurta = "'".addslashes(strip_tags(trim($_POST['descriere_scurta'])))."'";
                    $descriere = "'".addslashes(trim($_POST['descriere']))."'";
                    $linkyoutube = "'".$_POST['linkyoutube']."'";
                    
                    $sql ="UPDATE `0_clean_companii` SET
                                    `descriere_scurta`=$descriere_scurta,
                                    `descriere`=$descriere,
                                    `linkyoutube`=$linkyoutube,
                                    `limba`='ro'
                                    WHERE `utilizatori_id`=$id";
                    $rez = mysql_query($sql);
                    //salvarea imaginilor
                    for($i=1; $i<=5; $i++){
                            $poza = "imagine".$i;
                            $image=$_FILES[$poza]['name']; 
 			    //if it is not empty
 			    $parametri = "0#0#0#0";
                            //echo $image."<br>".$parametri;
                            if ($image){
                            	$this->incarcaImagine($id, $poza, $parametri);
 			    } //$imagine
                    } //for
                    if($rez) {
                        echo " &nbsp; <h3>Modific&#259;ri descriere companie</h3> &nbsp; ";
                        echo "<div class='mesaj'>Modific&#259;rile au fost salvate</div>";
                        echo "<meta http-equiv=\"refresh\" content=\"2; ".$lnk."?p=companie&sectiune=descr&id=$id\" />";
                    } else {
                        echo "<div class='eroare'>Modificarile nu au fost salvate . . . </div>";
                        $this->FormDescriere($id);
                    }                    
        } //function SalveazaDescriere
        
        
        
        function getExtension($str) {
        	 $i = strrpos($str,".");
        	 if (!$i) { return ""; }
        	 $l = strlen($str) - $i;
        	 $ext = substr($str,$i+1,$l);
        	 return $ext;
	} //function getExtension()
	
	function incarcaImagine($id, $poza, $parametri){
					$locatie = "utilizatori/imagini";
					//$parametri este un sir de forma $w#$h#$aliniere#$pozitia
					$p = explode("#", $parametri);
					$w = $p[0]; $h = $p[1]; $aliniere = $p[2]; $pozitia = $p[3]; //daca pozita este 0, trebuie sa calculam maximul de pozitii;; ptr tipul de paragraf numai cu poze
                                        //$poza este pozitia pozei:  poate fi imagine1, imagine2, imagine3, imagine4, imagine5                                       
 					
 					//get the original name of the file from the clients machine
 					$filename = stripslashes($_FILES[$poza]['name']);
 					//get the extension of the file in a lower case format
  					$extension = strtolower($this->getExtension($filename));
  					 	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 							{
								//print error message
 								$mesaj = $mesaj."<br>Fisierul imagine trebuie sa fie .jpg, sau .gif, sau .png <br /> ";
 							} else {
 								$numeimagine = $poza."_".$id; //get the name of picture from id of company and imagine1, imagine2 etc. -> cu numele construit asa, pot face si suprascrierea imaginilor, fa a mai fi nevoie sa le sterg pe cele vechi
                                                                $newname = "./upload/".$locatie."/".$numeimagine.".".$extension;
 								$copied = copy($_FILES[$poza]['tmp_name'], $newname);
 								$fisier = $numeimagine . "." . $extension;
 								//echo $copied;
 								
 								if(!$copied){
 									$mesaj = $mesaj."<br /> <br />Fisierul <i>".$fisier."</i> nu a fost urcat pe server!";
 									//$imagine = "";
 								}  else {
 									//salvez numele fisierului in baza de date
                                                                                $sql_fisier = "UPDATE `0_clean_companii` SET `$poza`='".$fisier."' WHERE `utilizatori_id` = $id";
                                                                                $rez_fisier = mysql_query($sql_fisier);
 									
 										//aici ar trebui sa vina si o mica functie de sters poza veche; dar vad maine
 										
										if($rez_fisier) {
                                                                                                $t = " "; //nu pot sa afisez nimic aici; functia va fi apelata in alta functie
												//echo "Imaginea a fost incarcata! ";
												//echo "<p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p><p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p>";
										} else {
												echo $sql_fisier;
												echo "<p> &nbsp; </p>";
												echo "Eroare la incarcarea imaginii!";
												echo "<p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p>";
										} 									
 								} //if $copied
 							} //if
	} //end function incarcaImagine()
        
        
        //sterg imagine
        function stergeImagine(){
                    $nume_imagine = $_GET['img']; //aici nu voi mai folosi clasa; voi face totul chiar in pagina, aici
                    $id = $_GET['id'];
                    $imagineX = $_GET['imaginex'];
                    
                    $l = 'upload/utilizatori/imagini/'.$nume_imagine;
                    $b = unlink($l);
                    
                    //acum scot si din BD
                    
                    $sql = "UPDATE `0_clean_companii` SET `$imagineX`='' WHERE `utilizatori_id`=$id";
                    $a = mysql_query($sql);
                    
                    if(!($a AND $b)) { //fac stergerea din BD doar daca a fost stearsa de pe server
                        echo " &nbsp; <div class='eroare'>Imaginea nu poate fi &#351tears&#259;! . . . </div> &nbsp; <br />";
                        echo "<br /> &nbsp; ";
                        echo $b;
                    } else {
                        echo "&#350;tergere imagine . . . <br /> &nbsp; <br> &nbsp; <br> &nbsp; <br /> &nbsp; <br /> "; //afiseaza Stergere imagine . . .
                        echo "<meta http-equiv=\"refresh\" content=\"1; ".$_SERVER['HTTP_REFERER']."\" />";
                    }  
        } //function stergeImagine()
        
        
        //scot datele societatii
        function dateCompanie($id) {
                                $id = (integer)$id;
                                $sql = "SELECT `0_clean_utilizatori`.*,
                                                `0_clean_companii`.`utilizatori_id`, `0_clean_companii`.`imagine1`, `0_clean_companii`.`imagine2`, `0_clean_companii`.`imagine3`, `0_clean_companii`.`imagine4`, `0_clean_companii`.`imagine5`,
                                                `0_clean_companii`.`descriere_scurta`, `0_clean_companii`.`descriere`, `0_clean_companii`.`linkyoutube`
                                                            FROM `0_clean_utilizatori`, `0_clean_companii`
                                                            WHERE `0_clean_utilizatori`.`id`=`0_clean_companii`.`utilizatori_id`
                                                                AND `0_clean_utilizatori`.`id`=$id";
                                $rez = mysql_query($sql);
                                $rnd = mysql_fetch_array($rez);
                                if(!$rez) echo mysql_error()."<br><small>".$sql;
                                return $rnd;
        }  //function dateCompanie()
        
        function Companie($id, $camp){
                                $r = $this->dateCompanie($id);
                                $a = $r[$camp];
                                return $a;
        } //function Companie()
        
        
        /***********************************************************
         *      Functie pentru verificare tipului de companie
         **********************************************************/
        function tip_companie($id, $strX_){
            $tip = $this->Companie($id, 'tip_companie');
            $pos = strpos($tip, $strX_);
            if ($pos === false) {
                    $a = "";
             } else {
                    $a = "selected='selected'";
             }
             return $a;
        } //function
        
        
        /**********************************************
         *  Functie pentru afisarea meniului selectat
         *********************************************/
        function  meniuSel(){
            //scot totul intr-un array
            if(!isset($_GET['sectiune'])) {
                $sel = 'general';
            } else {
                $sel = $_GET['sectiune'];
            }
            
            $a = array('general'=>" ",'descr'=>" ",'parola'=>" ",'judete'=>" ",'produse'=>" ", 'specialisti'=>" ");
            
            $a[$sel] = " class='ales' ";
            
            return $a;
        } //function meniuSel()
        
        
         /**********************************************
         *  Functie pentru scoaterea SC-ului din fata
         *  numelui companiei
         *  si cizelarea srl-ului
         *********************************************/
        function  scot_SC_ul($x){
            //scot SC S.C. SC. din numele unei companii
            
            $table = array(
                    'SC '=>'', 'S.C.'=>'', 'SC.'=>'', 'S.C '=>'',
                    'SRL'=>'srl', 's.r.l.'=>'srl', 'S.R.L.'=>'srl', 'SRl'=>'srl'
                );
   
            $a = strtr($x, $table); //inlocuiesc in numele companiei grupul de litere SC si SRL
            $a = trim($a);
            
            return $a;
        } //function scot_SC_ul()
        
        
        
        /****************************************************************
         *
         *
         *      SPECIALISTII nostri
         *      /adaug/modific/activez/desactivez/sterg specialisti
         *      
         *  
         ***************************************************************/
        
        
        
        /**************************************************
         *  Functie pentru lista de specialisti/companie
         *************************************************/
        function  specialisti($id){
            
            $id = (integer)$id; //$id = id-ul companiei
            $sql = "SELECT * FROM `0_clean_specialisti` WHERE `utilizatori_id`=$id";
            $rez = mysql_query($sql);
            $nr = mysql_numrows($rez);
            
            if($nr == 0) {
                return 0;
            } else {
                return $rez;
            }
        } //function specialisti()
        
        
        
        /**************************************************
         *  Functie pentru scoaterea datelor unui specialist
         *************************************************/
        function  specialist($id){
            
            $id = (integer)$id; //idul specialistului
            $sql = "SELECT * FROM `0_clean_specialisti` WHERE `id`=$id";
            $rez = mysql_query($sql);
            $nr = mysql_numrows($rez);
            
            if($nr == 0) {
                return 0;
            } else {
                $rnd = mysql_fetch_array($rez);
                return $rnd;
            }
        } //function specialist()
        
        
        /**************************************************
         *  Functie pentru afisarea listei de specialisti
         *************************************************/
        function  lista_specialisti($id){
            
            $id = (integer)$id; //idul companiei
            
            $r1 = $this->specialisti($id);
            
            if($r1 == 0) {
                echo "&nbsp; <br />Nu exist&#259; speciali&#351;ti ad&#259;uga&#355;i de aceast&#259; companie. <br /> &nbsp; ";
            } else {
                while($r = mysql_fetch_array($r1)){
                    $poza = $r['poza'];
                    $numele = stripslashes($r['numele']);
                    $email = $r['email'];
                    $detalii = stripslashes($r['detalii']);
                    if(strlen($poza)>4) {
                        $poza = "<img src='/upload/utilizatori/specialisti/$poza' class='poza' />";
                    } else {
                        $poza = "<img src='/images/no-picture.jpg' class='poza' />";
                    }
                    ?>
                    <div class='specialist'>
                        <?=$poza?>
                        <div class='specialist-sus'>
                            <div class='butoane'>
                                <!-- butonanele de activare/dezactivare -->
                                <?php
                                if($r['activ'] == 0){ //activarea unui specialist
                                ?>
                                            <form name='activare' action='' method='post' />
                                                <input type='hidden' name='activare' value='1' />
                                                <input type='hidden' name='idSpec' value='<?=$r['id']?>' />
                                                <input type='submit' name='activeaza' value='Activeaz&#259;' class='btn-activari-verde' />
                                            </form>
                                <?php
                                } else { //dezactivarea unui specialist
                                    ?>
                                            <form name='activare' action='' method='post' />
                                                <input type='hidden' name='activare' value='0' />
                                                <input type='hidden' name='idSpec' value='<?=$r['id']?>' />
                                                <input type='submit' name='activeaza' value='Dezactiveaz&#259;' class='btn-activari-rosu' />
                                            </form>
                                    <?php
                                }
                                ?>
                                &nbsp; <br />
                                <a href='index.php?p=companie&id=<?=$id?>&sectiune=specialisti&act=modifica&idSpec=<?=$r['id']?>'  title='Modific&#259; datele acestui specialist . . . ' class='btn-activari-modif'>Modific&#259;</a> &nbsp; 
                                <a href='index.php?p=companie&id=<?=$id?>&sectiune=specialisti&act=sterge&idSpec=<?=$r['id']?>' onclick='return confirm("Esti sigur ca vrei sa stergi acest specialist? \n\nDaca specialistul are intrebari validate(cu raspuns) acest specialist nu poate fi sters.")' title='&#350;terge specialistul . . . ' class='btn-activari-sterge'>&#350;terge</a>
                                <!-- END butonanele de activare/dezactivare -->
                            </div><!-- /.butoane -->
                            
                            <h3><?=$numele?></h3>
                            <a href='javascript:arata("specialist-detalii<?=$r['id']?>");'>vezi detalii specialist</a><br />
                            <a href='index.php?p=specialist&id=<?=$r['id']?>'>vezi &icirc;ntreb&#259;rile specialistului</a><br />
                        </div><!-- /.specialist-sus  -->
                        <div class='specialist-detalii' id='specialist-detalii<?=$r['id']?>'>
                            <?=$detalii?>
                            <div align='right' class='ascunde-detalii'><a href='javascript:ascunde("specialist-detalii<?=$r['id']?>");'>Ascunde detaliile</a> &nbsp; </div>
                        </div>
                    </div><!-- /.specialist -->
                    <div class='clar'> &nbsp; </div>
                    <?php
                } //while
            } //if
        } //function specialist()
        
        
        /**************************************************
         *  Functie afisare formular specialist nou
         *************************************************/
        function  AfisareSpecialistNou($id){            
            $id = (integer)$id; //idul companiei
            ?>
            <!-- buton -->
            <br />
            <button onclick='arata("formular_specNou");' class='btn-gri'>Adaug&#259; specialist</button><br /> &nbsp; 
            <!-- buton -->
            <div style='display: none; visibility: none;' id='formular_specNou'>
            <div id='utilizator-nou'>
                <form action="" method="post" enctype="multipart/form-data">
                <h3>&Icirc;nregistrare specialist nou</h3>
                        <!-- scriptul pentru editare descriere -->    
                        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
                        //<![CDATA[
                          bkLib.onDomLoaded(function() {
                                new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('descriere');
                          });
                          //]]>
                        </script>
                &nbsp;
                <input type='hidden' name='id' value='<?=$id?>' /><!-- id-ul companiei la care se adauga specialistul -->
                <table border='0' width='93%'>
                    <tr>
                        <td align='right' width='150'>Utilizator:</td>
                        <td><input type='text' name='utilizator' onblur='afisareMesajUserNou_("utilizator_");' value="<?=$_SESSION[v][utilizator]?>" /><span id='utilizator_'><?=$_SESSION[v][error][utilizator]?></span></td>
                    </tr>
                    <tr>
                        <td align='right'>Parola:</td>
                        <td><input type='password' name='password' onblur='afisareMesajUserNou_("parola_");' /><span id='parola_'><?=$_SESSION[v][error][password]?></span></td>
                    </tr>
                    <tr>
                        <td align='right' title='Verificare parola'>Parola (din nou):</td>
                        <td><input type='password' name='password2' onkeyup='afisareMesajUserNou_("parola2_");' /><span id='parola2_'></span></td>
                    </tr>
                    <tr>
                        <td align='right' title='Numele specialistului'>Numele:</td>
                        <td><input type='text' name='numele' onblur='afisareMesajUserNou_("numele_");' value="<?=$_SESSION[v][numele]?>" title='Numele specialistului' /><span id='numele_'><?=$_SESSION[v][error][numele]?></span></td>
                    </tr>
                    <tr>
                        <td align='right' title='E-mail - camp obligatoriu'>E-mail:</td>
                        <td><input type='text' name='email' title='C&acirc;mp obligatoriu' /></td>
                    </tr>
                    <tr>
                        <td align='right' title='O poza a specialistului'>Imagine:</td>
                        <td><input type='file' name='poza' /></td>
                    </tr>
                    <tr>
                        <td align='right'>Descriere:</td>
                        <td style="background-color: #FFF;"><textarea name="descriere" id='descriere' style="width: 330px; height: 100px;"><?=$descriere?></textarea> <br /> &nbsp;</td>
                    </tr>
                    <tr>
                    <tr>
                        <td style='padding-top: 16px;'>
                            <input type='submit' name='salveaza' value='Salveaz&#259;' /> &nbsp;
                            <input type='reset' value='Renun&#355;&#259;' style='color: #CD3404;' onclick='ascunde("formular_specNou");' /> 
                        </td>
                    </tr>
                    
                </table>
                </form>
            </div><!-- /#utilizator-nou, de fapt este specialist nou -->
            </div>
            <?php
        } //function AfisareSpecialistNou()
        
        
        /**************************************************
         *  Functie pentru salvarea Noului Specialist
         *************************************************/
        function  SalveazaSpecialist($id){
            $utilizator = addslashes(xss_clean($_POST['utilizator']));
            $utilizator = "'".addslashes(xss_clean($_POST['utilizator']))."'";
            $descriere = "'".addslashes(xss_clean($_POST['descriere']))."'";
            $numele = "'".addslashes(xss_clean($_POST['numele']))."'";
            
            
            $test = 1; //variabila care-mi spune daca sunt erori
            $specialist['eroare'] = ""; //mesajul de eroare care se afiseaza in cazul in care  
            
            if(strlen($utilizator) < 7) {
                $test = 0; $specialist['eroare'] .= "Utilizatorul trebuie s&#259; con&#355;in&#259; mai mult de 5 caractere.<br />";
            }
            if(strlen($numele) < 7) {
                $test = 0; $specialist['eroare'] .= "Numele specialistului trebuie s&#259; con&#355;in&#259; mai mult de 5 caractere.<br />";
            }
            if((strlen($_POST['password']) < 5) OR ($_POST['password'] != $_POST['password2'])) {
                $test = 0; $specialist['eroare'] .= "Parola trebuie s&#259; aib&#259; cel pu&#355;in 5 caractere. <br />
                            Parola trebuie s&#259; se verifice.<br />    ";
            }
            if(validate_email($_POST['email'])){
                $email = "'".$_POST['email']."'";
            } else {
                $test = 0; $specialist['eroare'] .= "Adresa de e-mail este invalid&#259;! <br />";
            }           
            
            
            $id = (integer)$id; //idul companiei
            
            //dupa ce am facut verificarile datelor trimise, fac salvarea
            
            if($test == 1){
                //mai intai verific daca exista un sepcialist cu acest nume in baza de date
                $s1 = "SELECT * FROM `0_clean_specialisti` WHERE `utilizator` LIKE $utilizator";
                $Rez1 = mysql_query($s1);
                $nrSpec = mysql_numrows($Rez1);
                if($nrSpec == 0){
                            
                            $sql = "INSERT INTO `0_clean_specialisti`(`utilizatori_id`, `utilizator`, `parola`, `numele`, `detalii`, `email`, `activ`)
                                            VALUES($id, $utilizator, '".md5($_POST['password'])."', $numele, $descriere, $email, 0)";
                            $rez = mysql_query($sql) OR die(mysql_error()."<br />". $sql);
                            if($rez){
                                echo "  &nbsp; <div class='mesaj'>A fost adaugat un specialist.</div> &nbsp; <br /> &nbsp;  ";
                                // incarc si poza specialistului aici
                                $idSpec = mysql_insert_id();//id-ul noului specialist
                                $this->incarcaPozaSpec($idSpec, 'poza');
                            } else {
                                echo " &nbsp; <p><i>Acest nume de utilizator exist&#259; deja &icirc;n baza de date.</i></p> &nbsp; ";
                            }
                    
                } else {
                    echo " &nbsp; <div class='eroare'>Noul specialist nu a fost adaugat. <br /> Verificati campurile completate. </div> &nbsp; <br /> &nbsp;   ";
                }
            } else {
                    echo " &nbsp; <div class='eroare'>Noul specialist nu a fost adaugat.  <br /> &nbsp; <br /> &nbsp;   ";
                    echo $specialist['eroare'] ."</div> &nbsp; <br /> ";
            } //if $test
        } //function SalveazaSpecialist()
        
        function incarcaPozaSpec($id, $poza){
					$locatie = "utilizatori/specialisti";
					 					
 					//get the original name of the file from the clients machine
 					$filename = stripslashes($_FILES[$poza]['name']);
 					//get the extension of the file in a lower case format
  					$extension = strtolower($this->getExtension($filename));
  					 	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 							{
								//print error message
 								$mesaj = $mesaj."<br>Fisierul imagine trebuie sa fie .jpg, sau .gif, sau .png <br /> ";
 							} else {
 								$numeimagine = $poza."_".$id; //get the name of picture from id of company and imagine1, imagine2 etc. -> cu numele construit asa, pot face si suprascrierea imaginilor, fa a mai fi nevoie sa le sterg pe cele vechi
                                                                $newname = "./upload/".$locatie."/".$numeimagine.".".$extension;
 								$copied = copy($_FILES[$poza]['tmp_name'], $newname);
 								$fisier = $numeimagine . "." . $extension;
 								//echo $copied;
 								
 								if(!$copied){
 									$mesaj = $mesaj."<br /> <br />Fisierul <i>".$fisier."</i> nu a fost urcat pe server!";
 									//$imagine = "";
 								}  else {
 									//salvez numele fisierului in baza de date
                                                                                $sql_fisier = "UPDATE `0_clean_specialisti` SET `$poza`='".$fisier."' WHERE `id` = $id";
                                                                                $rez_fisier = mysql_query($sql_fisier);
 									
 										//aici ar trebui sa vina si o mica functie de sters poza veche; dar vad maine
 										
										if($rez_fisier) {
                                                                                                $t = " "; //nu pot sa afisez nimic aici; functia va fi apelata in alta functie
												//echo "Imaginea a fost incarcata! ";
												//echo "<p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p><p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p>";
										} else {
												echo $sql_fisier;
												echo "<p> &nbsp; </p>";
												echo "Eroare la incarcarea imaginii!";
												echo "<p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p> <p> &nbsp; </p>";
										}
 								} //if $copied
 							} //if
	} //end function incarcaPozaSpec()
        
        
        /**************************************************
         *  Functie activare / dezactivare specialist
         *************************************************/
        function  specialistActivare(){
            
            $idSpec = (integer)$_POST['idSpec']; //idul specialistului
            $activare = (integer)$_POST['activare'];// ceea ce va deveni specialistul(0 sau 1)
            $sql = "UPDATE `0_clean_specialisti` SET `activ`= $activare WHERE `id`=$idSpec";
            $rez = mysql_query($sql);
            
        } //function specialistActivare()
        
        
        
        /**************************************************
         *  Functie modificare date specialist
         *************************************************/
        function  specialistFormularModifica($idSpec){
            
                            $idSpec = (integer)$idSpec; //idul specialistului                            
                            $r = $this->specialist($idSpec); //scot datele specialistului din BD
                            //acum vine formularul de modificare
                            //parola si utilizatorul nu se modifica; daca trebuie schimbate astea
                            //se sterge acest specialist si se inregistreaza din nou
                            
                                //acum scot poza(daca are poza)
                                $poza = $r['poza'];
                                if(strlen($poza)>4) {
                                    $poza = "<img src='/upload/utilizatori/specialisti/$poza' class='rightalign' style='width: 60px;' />";
                                } else {
                                    $poza = "<img src='/images/no-picture.jpg' class='rightalign' style='width: 60px;' />";
                                }
                            ?>
                            <div id='utilizator-nou'><!-- e scris utilizator nou, dar este, de fapt, modificare a datelor unui specialist -->
                                <form action="" method="post" enctype="multipart/form-data">
                                <?=$poza?>
                                <h3>Modificare date specialist</h3>
                                        <!-- scriptul pentru editare descriere -->    
                                        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
                                        //<![CDATA[
                                          bkLib.onDomLoaded(function() {
                                                new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('descriere');
                                          });
                                          //]]>
                                        </script>
                                &nbsp;
                                <input type='hidden' name='id' value='<?=$_GET['id']?>' /><!-- id-ul companiei la care se adauga specialistul -->
                                <input type='hidden' name='idSpec' value='<?=$idSpec?>' /><!-- id-ul specialistului la care se adauga specialistul -->
                                <table border='0' width='93%'>
                                    
                                    <tr>
                                        <td align='right' title='Numele specialistului' width='150'>Numele:</td>
                                        <td><input type='text' name='numele' onblur='afisareMesajUserNou_("numele_");' value="<?=$r['numele']?>" title='Numele specialistului' /><span id='numele_'><?=$_SESSION[v][error][numele]?></span></td>
                                    </tr>
                                    <tr>
                                        <td align='right' title='E-mail - c&acirc;mp obligatoriu'>E-mail:</td>
                                        <td><input type='text' name='email' title='C&acirc;mp obligatoriu' value="<?=$r[email]?>" /></td>
                                    </tr>
                                    <tr>
                                        <td align='right' title='O poza a specialistului'>Imagine:</td>
                                        <td><input type='file' name='poza' /></td>
                                    </tr>
                                    <tr>
                                        <td align='right'>Descriere:</td>
                                        <td style="background-color: #FFF;"><textarea name="descriere" id='descriere' style="width: 330px; height: 100px;"><?=stripslashes($r[detalii])?></textarea> <br /> &nbsp;</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td> </td>
                                        <td style='padding-top: 16px;'>
                                            <input type='submit' name='salveaza_modificarile' value='Salveaz&#259; modific&#259;rile' /> &nbsp;
                                            <input type='reset' value='Renun&#355;&#259;' style='color: #CD3404;' /> 
                                        </td>
                                    </tr>
                                    
                                </table>
                                </form>
                            </div><!-- /#utilizator-nou, de fapt este formular de modificare specialist vechi -->
                            <?php
        } //function specialistFormularModifica($idSpec)
        
        /**************************************************
         *  Functie SALVARE modificare date specialist
         *************************************************/
        function  specialistModifica($idSpec){
            
                            $idSpec = (integer)$_POST['idSpec']; //idul specialistului                            
                            $id = (integer)$_POST['id']; //id-ul companiei
                            $numele =  "'".addslashes(xss_clean($_POST['numele']))."'";
                            $descriere =  "'".addslashes(xss_clean($_POST['descriere']))."'";
                            
                            $test = 1;
                            $specialist['erori'] = "";
                            if(strlen($numele)<6) { $test = 0; $specialist['erori'] .= "Numele specialistului trebuie completat(minim 4 caractere)!<br />"; }
                            if(strlen($descriere)<6) { $test = 0; $specialist['erori'] .= "Descrierea specialistului (CV-ul) trebuie completat&#259;!<br />"; }
                            
                            if(validate_email($_POST['email'])) {
                                    $email = "'".$_POST['email']."'";
                                } else {
                                    $test = 0; $specialist['erori'] .= "E-mail invalid!<br />";
                                } //if $email
                            
                            if($test == 0) {
                                //daca valorile transmise nu au trecut testul, afisez mesajul de eroare
                                echo "<div class='eroare'>".$specialist['erori']."</div>";
                            } else {
                                //daca a trecut testul, atunci facem salvarea datelor
                                $sql = "UPDATE 0_clean_specialisti SET
                                            numele = $numele,
                                            email = $email,
                                            detalii = $descriere
                                            WHERE id = $idSpec";
                                $rez = mysql_query($sql);
                                if($_FILES['poza']){
                                    $r = $this->specialist($idSpec);
                                    if(strlen($r['poza'])>4) {
                                        unlink("upload/utilizatori/specialisti/".$r['poza']); //deci, daca poza exista, o sterg... ca vine alta noua
                                    }
                                    //acum adaug poza cea noua
                                    $this->incarcaPozaSpec($idSpec, 'poza');
                                }
                                if($rez) {
                                    echo "<br /> &nbsp; <div class='mesaj'>Modificarile au fost salvate . . . </div> &nbsp; <br /> ";
                                    echo "<meta http-equiv=\"refresh\" content=\"3; index.php?p=companie&id=$id&sectiune=specialisti\" />"; //fac si redirectare catre pagina Specialistii companiei
                                }
                            } //if $test
        } //function specialistModifica($idSpec)
        
        
        /**************************************************
         *  Functie STERG specialist
         *************************************************/
        function  specialistSterg($idSpec){
                            $idSpec = (integer)$idSpec; //idul specialistului                            
                            $id = (integer)$_GET['id']; //id-ul companiei
                            //aici trebuie sa bag si verificarea: are intrebari? nu-l sterg atunci.
                            //dar, mai tarziu asta
                            
                            
                            //acum
                            //aflu ce poza are acest specialist; ca sa sterg poza mai intai
                            $r = $this->specialist($idSpec);
                            if(strlen($r['poza'])>4) {
                                unlink("upload/utilizatori/specialisti/".$r['poza']); //deci, daca poza exista, o sterg... ca vine alta noua
                            }
                            //acum sterg din baza de date
                            $sql = "DELETE FROM 0_clean_specialisti WHERE id=$idSpec";
                            mysql_query($sql);                            
                            echo "<meta http-equiv=\"refresh\" content=\"3; ".$_SERVER['HTTP_REFERER']."\" />"; //fac si redirectare catre pagina Specialistii companiei
        } //function specialistSterge($idSpec)
        

} //class Utilizator

$Util = new Utilizator();